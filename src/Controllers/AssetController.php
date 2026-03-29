<?php

namespace App\Controllers;

class AssetController
{
    public function css(string $file)
    {
        if (! preg_match('/^[a-zA-Z-]+$/', $file)) {
            throw new Exception("Invalid CSS path '$file'");
        }

        header('Content-Type: text/css');

        return file_get_contents(__DIR__."/../../assets/css/$file.css");
    }

    public function manifest()
    {
        header('Content-Type: application/json');
        return file_get_contents(__DIR__."/../../assets/manifest.json");
    }

    public function icon()
    {
        header('Content-Type: image/svg+xml');
        return file_get_contents(__DIR__."/../../assets/com.vixalien.sticky.svg");
    }

    public function sw()
    {
        header('Content-Type: application/javascript');
        return file_get_contents(__DIR__."/../../assets/sw.js");
    }

    public function appJs()
    {
        header('Content-Type: application/javascript');
        return file_get_contents(__DIR__."/../../assets/app.js");
    }
}
