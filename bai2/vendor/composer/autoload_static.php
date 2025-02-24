<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9fb6cea75724b6289537eb783b1afcd2
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9fb6cea75724b6289537eb783b1afcd2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9fb6cea75724b6289537eb783b1afcd2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9fb6cea75724b6289537eb783b1afcd2::$classMap;

        }, null, ClassLoader::class);
    }
}
