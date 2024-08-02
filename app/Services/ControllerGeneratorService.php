<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
class ControllerGeneratorService 
{
    public function createController($controllerName, $functions)
    {
        app("MakingFilesHelper");
        app("RouteHelper");
        
        $controllerPath = app_path("Http/Controllers/{$controllerName}.php");

        $functionTemplates = '';
        foreach ($functions as $function) {
            $functionTemplates .= $this->generateFunctionTemplate($function['name']);
        }

        $controllerTemplate = $this->generateControllerTemplate($controllerName, $functionTemplates);

        File::put($controllerPath, $controllerTemplate);

        $this->addRoutes($controllerName, $functions);

        return response()->json(['message' => 'Controller created successfully']);
    }

    private function generateFunctionTemplate($functionName)
    {
        return <<<EOD

    public function {$functionName}(Request \$request)
    {
        // function body here
    }
EOD;
    }

    private function generateControllerTemplate($controllerName, $functions)
    {
        return <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class {$controllerName} extends Controller
{
{$functions}
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
