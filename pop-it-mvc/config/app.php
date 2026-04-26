<?php
return [
   //Класс аутентификации
   'auth' => \Auth\Auth::class,
   //Клас пользователя
   'identity' => \Model\User::class,
   //Классы для middleware
   'routeMiddleware' => [
       'auth' => \Middlewares\AuthMiddleware::class,
       'is_admin' => \Middlewares\AdminMiddleware::class,
       'is_employee' => \Middlewares\EmployeeMiddleware::class,
       'is_guest' => \Middlewares\GuestMiddleware::class,
        'bearer' => \Middlewares\BearerAuthMiddleware::class
   ],
   'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
        'json' => \Middlewares\JSONMiddleware::class
    ],
   'validators' => [
       'required' => \Validators\RequireValidator::class,
       'unique' => \Validators\UniqueValidator::class,
       'director_exists' => \Validators\DirectorExistsValidator::class,
       'format' => \Validators\FormatValidator::class,
       'aspirant_exists' => \Validators\AspirantExistsValidator::class,
       'date' => \Validators\DateValidator::class
   ],
   'providers' => [
   'kernel' => \Providers\KernelProvider::class,
   'route' => \Providers\RouteProvider::class,
   'db' => \Providers\DBProvider::class,
   'auth' => \Providers\AuthProvider::class,
],

];
