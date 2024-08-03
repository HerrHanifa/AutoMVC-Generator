<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ControllerGeneratorService 
{
    public function createController($controllerName, $functions)
    {
        app("MakingFilesHelper");
        app("RouteHelper");
        $methods = '';
        $traits = '';
        foreach ($traitNames as $traitName) {
            $traits .= "use \\App\\Functions\\{$traitName};\n";
    
            // Load the trait file content
            $traitPath = __DIR__ . "/app/Functions/{$traitName}.php"; // Adjust the path if necessary
            if (file_exists($traitPath)) {
                $fileContent = file_get_contents($traitPath);
    
                // Extract method bodies from the trait file content
                preg_match_all('/public function [a-zA-Z0-9_]+\([^\)]*\)\s*\{[^}]*\}/', $fileContent, $matches);
                foreach ($matches[0] as $method) {
                    $methods .= $method . "\n";
                }
            }
        }

        $controllerPath = app_path("Http/Controllers/{$controllerName}.php");


        $controllerTemplate = $this->generateControllerTemplate($controllerName, $traits, $methods);

        File::put($controllerPath, $controllerTemplate);

        $this->addRoutes($controllerName, $functions);

        return response()->json(['message' => 'Controller created successfully']);
    }


    private function generateControllerTemplate($controllerName, $traits,$methods)
    {
       
    return <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 {$traits}

class {$controllerName} extends Controller
{
   

    {$methods}
}
EOD;
    }



}

<<<EOD

نموذج API:
$controllerName = 'ExampleController';
$functions = [
    ['name' => 'index', 'method' => 'get'],
    ['name' => 'store', 'method' => 'post'],
    // Add more functions as needed
];
$routeFile = 'api'; // يمكن أن يكون 'web' أو 'api'

$controllerGeneratorService = new \App\Services\ControllerGeneratorService();
$controllerGeneratorService->createController($controllerName, $functions, $routeFile);

EOD;
