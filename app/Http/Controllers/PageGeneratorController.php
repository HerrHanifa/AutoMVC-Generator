<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use App\Services\ControllerGeneratorService;
use App\Services\MigrationService;
use App\Services\ViewGeneratorService;
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
    protected $ViewGeneratorService;

    public function __construct(
        ModelService $ModelService,
        ControllerGeneratorService $ControllerGeneratorService,
        MigrationService $MigrationService,
        ViewGeneratorService $ViewGeneratorService

    ) {
        $this->ModelService = $ModelService;
        $this->ControllerGeneratorService = $ControllerGeneratorService;
        $this->MigrationService = $MigrationService;
        $this->ViewGeneratorService = $ViewGeneratorService;

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
        $selectedFunctions = $request->functions;
    
        $functionsData = array_map('json_decode', $selectedFunctions, []);
        $functions = [];
        foreach ($functionsData as $functionData) {
            $functions[$functionData->function] = $functionData->method;
        }

        $requirdViews = $request->input('views');
        // dd($functions , $views);
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
        $this->ViewGeneratorService->createViews($tableName, $columns, $requirdViews);
        // Generate Routes
        RouteHelper::addRoutes($controllerName, $functions, $pathRoute);
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

        $className = basename($file, '.php');
        $pathClass = 'App\Functions\\'.$className;
        $reflectionClass = new ReflectionClass($pathClass);
        $method = $reflectionClass->getMethod($functionName);
        $parameters = $method->getParameters();
        $requestParameter = false;
        foreach ($parameters as $parameter) {
            if ($parameter->getType() && $parameter->getType()->getName() === 'Illuminate\Http\Request') {
                $requestParameter = true;
                break;
            }
        }
        $functions[$functionName] = $requestParameter ? 'POST' : 'GET';

            }
        }
        $views = ['create' , 'index' , 'show' ,'edit'];
        return view('admin.migration-maker.create' , compact('migrations_name','functions','views'));
    }
}
