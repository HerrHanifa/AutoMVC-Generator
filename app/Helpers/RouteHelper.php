<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use ReflectionMethod;

class RouteHelper
{
    public static function addRoutes($controllerName, $functions, $routeFile = 'web')
    {
        $functions_with_keys = [];
        foreach ($functions as $functionFileName) {
            // إزالة الامتداد '.php' من اسم الملف
            $functionName = strtolower(str_replace('Function.php', '', $functionFileName));
            
            // تحديد نوع الـ method
            if($routeFile== 'web')
            {
                $reflection = new ReflectionMethod("App\Http\Controllers\controlPanal\\{$controllerName}", $functionName);
            }
           else if($routeFile== 'api'){
            $reflection = new ReflectionMethod("App\Http\Controllers\Api\\{$controllerName}", $functionName);
           }
            $params = $reflection->getParameters();
            $method = 'get';
            $routeParams = '';

            if (count($params) > 0) {
                foreach ($params as $param) {
                    if ($param->getClass() && $param->getClass()->name == 'Illuminate\Http\Request') {
                        $method = 'post';
                    } else {
                        $routeParams .= '/{' . $param->getName() . '}';
                    }
                }
            }

            $functions_with_keys[$functionName] = [
                'method' => $method,
                'params' => $routeParams
            ];
        }

        $urlPath = strtolower(str_replace('Controller', '', $controllerName));
        $routeFilePath = base_path("routes/{$routeFile}.php");

        if (!File::exists($routeFilePath)) {
            throw new \Exception("The route file {$routeFile}.php does not exist.");
        }

        $routeContent = File::get($routeFilePath);
        $newRoutes = '';

        if (!is_array($functions) || empty($functions)) {
            throw new \Exception("Invalid or empty functions array provided.");
        }

        foreach ($functions_with_keys as $functionName => $functionData) {
            if (!is_string($functionName)) {
                throw new \Exception("Invalid function name '{$functionName}' in controller '{$controllerName}'. Function name must be a string.");
            }

            if (!is_array($functionData) || !isset($functionData['method'])) {
                throw new \Exception("Invalid function data for function '{$functionName}' in controller '{$controllerName}'.");
            }

            $routeMethod = strtolower($functionData['method']);
            $routeParam = $functionData['params'];

            if($routeFile == 'web'){
                $newRoutes .= <<<EOD

Route::{$routeMethod}('/{$urlPath}/{$functionName}{$routeParam}', [App\Http\Controllers\controlPanal\\{$controllerName}::class, '{$functionName}'])->name('{$urlPath}.{$functionName}.{$routeFile}');
EOD;
            } else {
                $newRoutes .= <<<EOD

Route::{$routeMethod}('/{$urlPath}/{$functionName}{$routeParam}', [App\Http\Controllers\Api\\{$controllerName}::class, '{$functionName}'])->name('{$urlPath}.{$functionName}.{$routeFile}');
EOD;
            }
        }

        $routeContent .= $newRoutes;
        File::put($routeFilePath, $routeContent);
    }
}
