<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf57654b8aebdd6e580db9c42a33d0e57
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf57654b8aebdd6e580db9c42a33d0e57::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf57654b8aebdd6e580db9c42a33d0e57::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
