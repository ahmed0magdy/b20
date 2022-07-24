<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb193f99fcec91fb79bf3654241aa8a63
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb193f99fcec91fb79bf3654241aa8a63::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb193f99fcec91fb79bf3654241aa8a63::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb193f99fcec91fb79bf3654241aa8a63::$classMap;

        }, null, ClassLoader::class);
    }
}