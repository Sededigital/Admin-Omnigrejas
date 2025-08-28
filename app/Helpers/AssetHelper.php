<?php

namespace App\Helpers;

class AssetHelper
{
    public static function inlineJs(string $path): string
    {
        $fullPath = resource_path("js/{$path}");

        if (!file_exists($fullPath)) {
            return "<!-- Arquivo {$path} não encontrado -->";
        }

        return file_get_contents($fullPath);
    }
}
