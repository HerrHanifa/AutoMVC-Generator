<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class RouteHelper
{
    public static function addRoutes($controllerName, $functions, $routeFile = 'web')
    {
        $urlPath = strtolower(str_replace('Controller','',$controllerName));
        $routeFilePath = base_path("routes/{$routeFile}.php");
        if (!File::exists($routeFilePath)) {
            throw new \Exception("The route file {$routeFile}.php does not exist.");
        }

        $routeContent = File::get($routeFilePath);

        $newRoutes = '';
        foreach ($functions as $functionName => $functionData) {
            $routeName = $functionName;
            $routeMethod = strtolower($functionData['method']);
            $routeParam = '';
            if($functionData['params'])
            $routeParam = '/{'.$functionData['params'].'}';


            $newRoutes .= <<<EOD

Route::{$routeMethod}('/{$urlPath}/{$routeName}{$routeParam}', [App\Http\Controllers\\{$controllerName}::class, '{$routeName}'])->name('{$urlPath}.{$routeName}');
EOD;
        }

        $routeContent .= $newRoutes;

        File::put($routeFilePath, $routeContent);
    }
}
