<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use App\Services\ControllerGeneratorService;
use App\Services\MigrationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helpers\RouteHelper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ReflectionClass;

class PageGeneratorController extends Controller
{
    protected $ModelService;
    protected $ControllerGeneratorService;
    protected $MigrationService;


    public function __construct(
        ModelService $ModelService,
        ControllerGeneratorService $ControllerGeneratorService,
        MigrationService $MigrationService,

    ) {
        $this->ModelService = $ModelService;
        $this->ControllerGeneratorService = $ControllerGeneratorService;
        $this->MigrationService = $MigrationService;

    }

    public function createPage(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'table_name' => 'required|string|max:255',
        //     'columns' => 'required|array',
        //     'controller_name' => 'required|string|max:255',
        //     'functions' => 'required|array'
        // ]);

        $tableName = $request->input('table_name');
        $columns = $request->input('columns');
     $controllerName= ucfirst(Str::camel($tableName)) . 'Controller';
        // $controllerName = $request->input('controller_name');
        $functions = $request->input('functions');
        $pathRoute = $request->input('type_route');

            // Generate Migration
        $this->MigrationService->generateMigrationContent($tableName, $columns);

        // استخراج أسماء الأعمدة من مصفوفة الأعمدة
$namescolumns = array_column($columns, 'name');

// استدعاء الدالة مع أسماء الأعمدة فقط
$this->ModelService->createModel($tableName, $namescolumns);



        // Generate Controller
        $this->ControllerGeneratorService->createController($controllerName, $functions);
        // Generate Views
        // $this->viewGeneratorService->createViews($tableName);


        // Generate Routes

            // RouteHelper::addRoutes($controllerName, $functions, $pathRoute);


        return response()->json(['message' => 'Page created successfully!']);
    }


    public function index()
    {
        $migrations = DB::table('migrations')->get();


        return view('admin.migration-maker.index', compact('migrations'));
    }
    public function create(){
        $migrations = DB::table('migrations')->get();
        $migrations_name = [];
        foreach($migrations as $migration){
            $migrations_name[] = substr_replace(substr_replace($migration->migration, '', 0, 25),'',-6);
        }

        $functionFiles = scandir(app_path('Functions'));
$functions = [];
foreach ($functionFiles as $file) {
    if (preg_match('/Function\.php$/', $file)) {
        $functionName = Str::camel(str_replace('Function.php', '', $file));
        $functions[$functionName] = $functionName;

    }
}
// $trait = [];
// foreach (glob("app/Functions/*.php") as $file) {
//     $className = basename($file, '.php');

//     $reflectionClass = new ReflectionClass($className);
//     $method = $reflectionClass->getMethod($reflectionClass->getName()); // نحصل على الطريقة الوحيدة في الملف

//     $parameters = $method->getParameters();
//     $requestParameter = false;
//     foreach ($parameters as $parameter) {
//         if ($parameter->getType() && $parameter->getType()->getName() === 'Illuminate\Http\Request') {
//             $requestParameter = true;
//             break;
//         }
//     }

//     $trait[$method->getName()] = [
//         'method' => $requestParameter ? 'POST' : 'GET',
//     ];
// }

// dd($trait);


        return view('admin.migration-maker.create' , compact('migrations_name','functions'));
    }
}
