<?php return [
    'plugin' => [
        'name' => 'Backend Pre-Registration',
        'description' => 'Allows visitors to pre-register as backend users'
    ],
    'permissions' => [
        'manage_plugin' => 'Manage plugin settings',
        'view_additional_fields' => 'View registration'
    ],
    'role' => [
        'name' => 'Pre-registered member',
        'description' => 'Member waiting for his password'
    ],
    'settings' => [
        'label' => 'Pre-Registration',
        'description' => 'Customize the pre-registration page',
        'fields' => [
            'page_title' => [
                'label' => 'Pre-Registration page title'
            ],
            'page_subtitle' => [
                'label' => 'Sub-title'
            ],
            'open_registration' => [
                'label' => 'Open registration'
            ],
            'registration_open_at' => [
                'label' => 'Registration open at',
                'comment' => 'Leave blank to open pre-registration now'
            ],
            'send_password_automatically' => [
                'label' => 'Send password automatically'
            ],
            'send_password_at' => [
                'label' => 'Send password at',
            ],
            'role' => [
                'label' => 'Role on registration',
                'comment' => 'This role will be set to the new users on registration'
            ],
            'additional_fields' => [
                'label' => 'Additional fields',
                'comment' => 'These fields will be displayed on the pre-registration form'
            ],
            'attributes' => [
                'label' => 'Attributes',
                'comment' => 'Theses attributes will be added to the input'
            ],
            'label' => [
                'label' => 'Label'
            ],
            'name' => [
                'label' => 'Name'
            ],
            'value' => [
                'label' => 'Value'
            ],
            'type' => [
                'label' => 'Type',
                'options' => [
                    'text' => 'Text'
                ]
            ],
            'required' => [
                'label' => 'Required'
            ],
        ]
    ],

        'coming_soon' => [
        'open_at' => 'Pre-registrations will be open on :'
    ],

    'thank-you' => [
        'title' => 'Successful pre-registration',
        'message' => 'We are glad you have pre-registered to our service.',
        'credentials_will_be_sent_on' => 'Your credentials will be sent by email on: ',
        'date_format' => 'l jS \\of F Y \\a\\t h:i A'
    ]
];
