<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/www/user/plugins/custom-css/blueprints.yaml',
    'modified' => 1508614492,
    'data' => [
        'name' => 'Custom CSS',
        'version' => '0.2.1',
        'description' => 'Adds some custom CSS to your Grav site',
        'icon' => 'plug',
        'author' => [
            'name' => 'Team Grav',
            'email' => 'devs@getgrav.org'
        ],
        'homepage' => 'https://github.com/getgrav/grav-plugin-custom-css',
        'keywords' => 'grav, plugin, css, design',
        'bugs' => 'https://github.com/getgrav/grav-plugin-custom-css/issues',
        'readme' => 'https://github.com/getgrav/grav-plugin-custom-css/blob/develop/README.md',
        'license' => 'MIT',
        'form' => [
            'validation' => 'strict',
            'fields' => [
                'enabled' => [
                    'type' => 'toggle',
                    'label' => 'Plugin status',
                    'highlight' => 1,
                    'default' => 0,
                    'options' => [
                        1 => 'Enabled',
                        0 => 'Disabled'
                    ],
                    'validate' => [
                        'type' => 'bool'
                    ]
                ],
                'css_inline' => [
                    'type' => 'textarea',
                    'label' => 'Inline CSS',
                    'help' => 'CSS that will be added inline to every page'
                ],
                'css_files' => [
                    'type' => 'list',
                    'label' => 'CSS Files',
                    'help' => 'CSS Files that will be loaded on every page. Use relative or absolute URLs',
                    'fields' => [
                        '.path' => [
                            'type' => 'text',
                            'label' => 'File path',
                            'help' => 'Relative to web root'
                        ],
                        '.priority' => [
                            'type' => 'int',
                            'label' => 'Priority (0=Default)',
                            'help' => 'Lower means later inclusion. Negative value to add this file after the other files (that come with the theme)',
                            'default' => 0
                        ]
                    ]
                ]
            ]
        ]
    ]
];
