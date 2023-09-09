<?php return [
    'plugin' => [
        'description' => 'Позволяет вашим посетителям регистрироваться как пользователи Backend'
    ],

    'permissions' => [
        'manage_plugin' => 'Управление настройками плагина',
        'view_additional_fields' => 'Просмотр регистрации'
    ],

    'settings' => [
        'label' => 'Регистрация в админке',
        'description' => 'Управление регистрацией в админке',
        'fields' => [
            'open_registration' => [
                'label' => 'Открыть регистрацию'
            ],
            'registration_open_at' => [
                'label' => 'Открыть регистрацию в',
                'comment' => 'Оставьте пустым, чтобы открыть регистрацию сейчас'
            ],
            'role' => [
                'label' => 'Роль при регистрации',
                'comment' => 'Эта роль будет установлена новым пользователям при регистрации'
            ],
            'need_terms_agreement' => [
                'label' => 'Необходимо согласие с условиями',
                'comment' => 'Условия обслуживания отображаются через всплывающее окно на странице регистрации'
            ],
            'terms' => [
                'label' => 'Условия обслуживания',
            ],
            'need_activation' => [
                'label' => 'Необходима активация по email',
                'comment' => 'Если установлен флажок, пароль будет отправлен по email'
            ]
        ],
    ],

    'account' => [
        'want_to_register' => "Я хочу зарегистрироваться",
        'password_confirmation_placeholder' => "подтверждение пароля",
        'already_registered' => "У меня уже есть аккаунт",
        'register' => "Регистрация",
    ],

    'register' => [
        'i_confirm_read_the' => 'Я подтверждаю, что прочитал и принимаю',
        'terms' => 'Условия обслуживания'
    ],

    'coming_soon' => [
        'coming_soon' => 'Скоро открытие',
        'open_at' => 'Регистрация откроется:',
    ],

    'messages' => [
        'password_will_be_sent' => 'Для подтверждения вашего email пароль будет отправлен на него.',
        'password_has_been_sent' => 'Ваш пароль был отправлен на ваш email.'
    ],

    'date_format' => 'l jS \\of F Y \\в h:i A'
];
