<?php

namespace App\Http\Controllers;

use App\Services\ModelService;
use App\Services\ControllerGeneratorService;
use App\Services\MigrationService;
use App\Services\RouteGeneratorService;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageGeneratorController extends Controller
{
    protected $ModelService;
    protected $controllerGeneratorService;
    protected $MigrationService;
    protected $routeGeneratorService;

    public function __construct(
        ModelService $ModelService,
        // ControllerGeneratorService $controllerGeneratorService,
        MigrationService $MigrationService,
        // RouteGeneratorService $routeGeneratorService
    ) {
        $this->ModelService = $ModelService;
        // $this->controllerGeneratorService = $controllerGeneratorService;
        $this->MigrationService = $MigrationService;
        // $this->routeGeneratorService = $routeGeneratorService;
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
      
        // $controllerName = $request->input('controller_name');
        // $functions = $request->input('functions');

            // Generate Migration
        $this->MigrationService->generateMigrationContent($tableName, $columns);

        // استخراج أسماء الأعمدة من مصفوفة الأعمدة
$namescolumns = array_column($columns, 'name');

// استدعاء الدالة مع أسماء الأعمدة فقط
$this->ModelService->createModel($tableName, $namescolumns);



        // Generate Controller
        $this->controllerGeneratorService->createController($controllerName, $functions);
        // Generate Views
        $this->viewGeneratorService->createViews($tableName);

    
        // Generate Routes
        foreach ($functions as $function) {
            $this->routeGeneratorService->addRoute($controllerName, $function, 'web');
        }

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




        return view('admin.migration-maker.create' , compact('migrations_name','functions'));
    }
}
