<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Supported Locales
    |--------------------------------------------------------------------------
    |
    | This array contains all the locales that are supported by the application.
    | The keys should match the locales in your lang directories.
    |
    */
    'supported_locales' => [
        'ar' => [
            'name' => 'العربية',
            'flag' => '🇸🇦',
            'dir' => 'rtl',
        ],
        'en' => [
            'name' => 'English',
            'flag' => '🇺🇸',
            'dir' => 'ltr',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | This option determines the default locale for localization.
    | Should match one of the supported_locales keys.
    |
    */
    'default_locale' => 'ar',

    /*
    |--------------------------------------------------------------------------
    | Session Key
    |--------------------------------------------------------------------------
    |
    | This option determines the session key used to store the locale.
    |
    */
    'session_key' => 'locale',

    /*
    |--------------------------------------------------------------------------
    | Accept-Language Header
    |--------------------------------------------------------------------------
    |
    | Enable or disable automatic locale detection from browser's Accept-Language header.
    |
    */
    'accept_language' => false,

    /*
    |--------------------------------------------------------------------------
    | Hide Default Locale
    |--------------------------------------------------------------------------
    |
    | Hide the default locale from the URL.
    |
    */
    'hide_default' => false,

    /*
    |--------------------------------------------------------------------------
    | Redirect to Localized URLs
    |--------------------------------------------------------------------------
    |
    | Redirect users to localized URLs when they visit the root URL.
    |
    */
    'redirect_to_localized' => false,
];
