<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ControllerGeneratorService
{
    public function createController($controllerName, $functions)
    {
        $methods = '';
        $traits = '';

        // Generate the function files array
        foreach ($functions as $functionName => $methodNAme) {
            $fileName = Str::studly($functionName) . 'Function';
            $functionFiles[$functionName] = $fileName;
        }
        // Extract the model name from the controller name
        $modelName = str_replace('Controller', '', $controllerName);
// dd($functionFiles);
        // Extract traits and methods
        foreach ($functionFiles as $functionName => $fileName) {
            $traits .= "use \\App\\Functions\\{$fileName};\n";

            // Load the trait file content
            $traitPath = app_path("Functions/{$fileName}.php");
            if (file_exists($traitPath)) {
                $fileContent = file_get_contents($traitPath);

                // Extract method bodies from the trait file content
                preg_match_all('/public function [a-zA-Z0-9_]+\([^\)]*\)\s*\{[^}]*\}/', $fileContent, $matches);
                foreach ($matches[0] as $method) {
                    $methodWithModel = str_replace('{$modelName}', $modelName, $method);
                    $methods .= $methodWithModel . "\n";

                }
            }
        }

        $controllerPath = app_path("Http/Controllers/{$controllerName}.php");

        // Generate the controller template
        $controllerTemplate = $this->generateControllerTemplate($controllerName, $traits, $methods, $modelName);

        // Save the controller file
        File::put($controllerPath, $controllerTemplate);

        // Add routes
        // $this->addRoutes($controllerName, $functions);

        return response()->json(['message' => 'Controller created successfully']);
    }

    private function generateControllerTemplate($controllerName, $traits, $methods, $modelName)
    {
                // Generate the model path
                $modelPath = "use App\\Models\\{$modelName};";

        return <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
{$traits}
{$modelPath}

class {$controllerName} extends Controller
{
    {$methods}
}
EOD;
    }

    public function addRoutes($controllerName, $functions, $routeFile = 'web')
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
