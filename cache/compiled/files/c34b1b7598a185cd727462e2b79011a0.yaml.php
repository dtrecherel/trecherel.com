<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/www/user/config/site.yaml',
    'modified' => 1509267303,
    'data' => [
        'title' => 'Didier Trécherel - Yuriko\'s writeups',
        'default_lang' => 'en',
        'author' => [
            'name' => 'Didier Trécherel',
            'email' => 'didier.trecherel@gmail.com'
        ],
        'taxonomies' => [
            0 => 'category',
            1 => 'tag'
        ],
        'metadata' => [
            'description' => 'I\'m Didier Trécherel, a guy in computer security, and this is my small corner of the web where I\'ll post some writeups on CTF and stuff like that.'
        ],
        'summary' => [
            'enabled' => true,
            'format' => 'short',
            'size' => 300,
            'delimiter' => '==='
        ],
        'blog' => [
            'route' => '/blog'
        ]
    ]
];
