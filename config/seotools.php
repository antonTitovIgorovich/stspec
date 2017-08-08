<?php

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => "Service Tuning Spec.", // set false to total remove
            'description' => 'Автосервис на окружной в Киеве', // set false to total remove
            'separator' => ' | ',
            'keywords' => ['автосервис', 'Киев',
                'окружная', 'окружной', 'ремонт машин',
                'субару', 'subaru', 'тюнинг'],
            'canonical' => url('/'), // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'yandex' => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'Service Tuning Spec.', // set false to total remove
            'description' => 'Автосервис на окружной в Киеве', // set false to total remove
            'url' => null, // Set null for using Url::current(), set false to total remove
            'type' => 'website',
            'site_name' => 'Service Tuning Spec.',
            'images' => [asset('images/s_logo.svg')],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
];
