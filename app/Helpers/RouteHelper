<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class RouteHelper
{
    public static function addRoutes($controllerName, $functions, $routeFile = 'web')
    {
        $routeFilePath = base_path("routes/{$routeFile}.php");
        
        if (!File::exists($routeFilePath)) {
            throw new \Exception("The route file {$routeFile}.php does not exist.");
        }

        $routeContent = File::get($routeFilePath);

        $newRoutes = '';
        foreach ($functions as $function) {
            $routeName = $function['name'];
            $routeMethod = strtolower($function['method']);
            $newRoutes .= <<<EOD

Route::{$routeMethod}('/{$routeName}', [App\Http\Controllers\\{$controllerName}::class, '{$routeName}']);
EOD;
        }

        $routeContent .= $newRoutes;

        File::put($routeFilePath, $routeContent);
    }
}
