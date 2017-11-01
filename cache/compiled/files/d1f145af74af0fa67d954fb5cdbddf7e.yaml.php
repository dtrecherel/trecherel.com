<?php
return [
    '@class' => 'Grav\\Common\\File\\CompiledYamlFile',
    'filename' => '/var/www/www/user/config/plugins/simplesearch.yaml',
    'modified' => 1509302655,
    'data' => [
        'enabled' => true,
        'built_in_css' => true,
        'display_button' => false,
        'min_query_length' => 3,
        'route' => '/search',
        'search_content' => 'raw',
        'template' => 'simplesearch_results',
        'filters' => [
            'category' => [
                0 => '@none'
            ]
        ],
        'filter_combinator' => 'and',
        'ignore_accented_characters' => true,
        'order' => [
            'by' => 'date',
            'dir' => 'desc'
        ]
    ]
];
