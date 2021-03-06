<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2ac7b78041f61c08f7358205691aff3
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OpenXBL\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OpenXBL\\' => 
        array (
            0 => __DIR__ . '/..' . '/openxbl/openxbl/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2ac7b78041f61c08f7358205691aff3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2ac7b78041f61c08f7358205691aff3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
