<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/www/user/config/plugins/aboutme.yaml',
    'modified' => 1509312196,
    'data' => [
        'enabled' => true,
        'built_in_css' => true,
        'name' => 'Didier Trécherel',
        'title' => 'Present Giver',
        'description' => 'I love cats, infosec, and pineapple on my pizza :3',
        'picture_src' => [
            'user/plugins/aboutme/assets/avatars/avatar.jpg' => [
                'name' => 'avatar.jpg',
                'type' => 'image/jpeg',
                'size' => 24946,
                'path' => 'user/plugins/aboutme/assets/avatars/avatar.jpg'
            ]
        ],
        'gravatar' => [
            'enabled' => false,
            'email' => 'example@test.com',
            'size' => 100
        ],
        'social_pages' => [
            'enabled' => true,
            'use_font_awesome' => false,
            'pages' => [
                'facebook' => [
                    'icon' => 'facebook-official',
                    'title' => 'Facebook',
                    'position' => 1
                ],
                'twitter' => [
                    'icon' => 'twitter',
                    'title' => 'Twitter',
                    'position' => 2,
                    'url' => 'https://www.twitter.com/dtrecherel'
                ],
                'google_plus' => [
                    'icon' => 'google-plus-square',
                    'title' => 'Google+',
                    'position' => 3
                ],
                'github' => [
                    'icon' => 'github',
                    'title' => 'GitHub',
                    'position' => 4,
                    'url' => 'https://github.com/dtrecherel'
                ],
                'linkedin' => [
                    'icon' => 'linkedin-square',
                    'title' => 'LinkedIn',
                    'position' => 5,
                    'url' => 'https://www.linkedin.com/in/dtrecherel/'
                ],
                'instagram' => [
                    'icon' => 'instagram',
                    'title' => 'Instagram',
                    'position' => 6
                ]
            ]
        ]
    ]
];
