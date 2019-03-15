<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96221355e77d8a0d4bc825d7d2e7ae1a
{
    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yafr\\' => 5,
        ),
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yafr\\' => 
        array (
            0 => __DIR__ . '/..' . '/jhq0113/yaf-yar/src',
        ),
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit96221355e77d8a0d4bc825d7d2e7ae1a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96221355e77d8a0d4bc825d7d2e7ae1a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
