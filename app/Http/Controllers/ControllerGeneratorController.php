<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ControllerGeneratorController extends Controller
{
    public function createController($controllerName, $functions)
    {
        $controllerName = $request->input('controller_name');
        $functions = $request->input('functions');
        
        $controllerPath = app_path("Http/Controllers/{$controllerName}.php");

        $functionTemplates = '';
        foreach ($functions as $functionName) {
            $functionTemplates .= $this->generateFunctionTemplate($functionName);
        }

        $controllerTemplate = $this->generateControllerTemplate($controllerName, $functionTemplates);

        File::put($controllerPath, $controllerTemplate);

        return response()->json(['message' => 'Controller created successfully']);
    }

    private function generateFunctionTemplate($functionName)
    {
        $className = "App\\Helpers\\ControllerFunctions\\{$functionName}Function";
        if (class_exists($className) && method_exists($className, 'getFunctionContent')) {
            return $this->getFunctionContent($functionName);
        } else {
            return <<<EOD

    public function {$functionName}(Request \$request)
    {
        // Function content not found.
    }
EOD;
        }
    }

    private function getFunctionContent($functionName)
    {
        $className = "App\\Helpers\\ControllerFunctions\\{$functionName}Function";
        $functionContent = $className::getFunctionContent();
        $functionBody = $this->convertClosureToString($functionContent);
        return <<<EOD

    public function {$functionName}(Request \$request)
    {
        {$functionBody}
    }
EOD;
    }

    private function convertClosureToString(\Closure $closure)
    {
        $reflection = new \ReflectionFunction($closure);
        $file = new \SplFileObject($reflection->getFileName());
        $file->seek($reflection->getStartLine() - 1);
        $code = '';
        while ($file->key() < $reflection->getEndLine()) {
            $code .= $file->current();
            $file->next();
        }
        $code = trim(preg_replace('/^.*function[^\{]*\{/', '', rtrim($code)));
        $code = preg_replace('/\}[^\}]*$/', '', $code);
        return $code;
    }

    private function generateControllerTemplate($controllerName, $functions)
    {
        return <<<EOD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class {$controllerName} extends Controller
{
{$functions}
}
EOD;
    }
}