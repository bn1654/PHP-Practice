<?php
return [
   //Класс аутентификации
   'auth' => \Src\Auth\Auth::class,
   //Клас пользователя
   'identity' => \Model\User::class,
   //Классы для middleware
   'routeMiddleware' => [
       'auth' => \Middlewares\AuthMiddleware::class,
       'is_admin' => \Middlewares\AdminMiddleware::class,
       'is_employee' => \Middlewares\EmployeeMiddleware::class,
       'is_guest' => \Middlewares\GuestMiddleware::class,
   ],
   'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class
    ],
   'validators' => [
       'required' => \Validators\RequireValidator::class,
       'unique' => \Validators\UniqueValidator::class
   ],
];
