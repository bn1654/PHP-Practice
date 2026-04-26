<?php
use PHPUnit\Framework\TestCase;
use Model\User;
use Src\View;
use Model\Role;

class UserControllerTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     * @runInSeparateProcess
     */
    public function testSignup(string $httpMethod, array $userData, string $expected): void
    {
        if ($userData['login'] === 'login is busy') {
            $userData['login'] = User::get()->first()->login;
        }

        $request = $this->createMock(\Src\Request::class);
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        $result = (new \Controller\UserController())->signup($request);

        if (!empty($result)) {
            if ($httpMethod === 'GET') {
               $this->expectOutputRegex('/Регистрация нового пользователя/');
               } else {
                $this->expectOutputRegex('/' . preg_quote($expected, '/') . '/');
            }
            return;
        }

        // Успешный POST – редирект
        $this->assertTrue((bool)User::where('login', $userData['login'])->count());
        User::where('login', $userData['login'])->delete();
        $this->assertContains($expected, xdebug_get_headers());
    }

    public static function additionProvider(): array
    {
        return [
            // GET – проверка формы (ожидание не используется, т.к. в тесте отдельная ветка)
            ['GET', ['role' => '', 'login' => '', 'password' => '', 'password2' => ''], ''],

            // POST все поля пусты – ожидаем текст "Поле пусто" (он появляется трижды)
            ['POST', ['role' => '', 'login' => '', 'password' => '', 'password2' => ''],
                'Поле пусто'],

            // POST занятый логин – ожидаем текст "Поле должно быть уникально"
            ['POST', ['role' => '1', 'login' => 'login is busy', 'password' => 'admin', 'password2' => 'admin'],
                'Поле должно быть уникально'],

            // POST пароли не совпадают – ожидаем текст "Пароли должны совпадать"
            ['POST', ['role' => '1', 'login' => md5(time()), 'password' => 'admin', 'password2' => 'a'],
                'Пароли должны совпадать'],

            // POST успешная регистрация – редирект
            ['POST', ['role' => '1', 'login' => md5(time()), 'password' => 'admin', 'password2' => 'admin'],
                'Location: /'],
        ];
    }

    protected function setUp(): void
    {
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';

        $GLOBALS['app'] = new Src\Application(new Src\Settings([
            'app' => include $_SERVER['DOCUMENT_ROOT'] . '/config/app.php',
            'db' => include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php',
            'path' => include $_SERVER['DOCUMENT_ROOT'] . '/config/path.php',
        ]));

        if (!function_exists('app')) {
            function app() {
                return $GLOBALS['app'];
            }
        }
    }
}