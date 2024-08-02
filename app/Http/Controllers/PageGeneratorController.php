<?php

namespace App\Http\Controllers;

use App\Services\ModelGeneratorService;
use App\Services\ControllerGeneratorService;
use App\Services\MigrationGeneratorService;
use App\Services\RouteGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageGeneratorController extends Controller
{
    protected $modelGeneratorService;
    protected $controllerGeneratorService;
    protected $migrationGeneratorService;
    protected $routeGeneratorService;

    public function __construct(
        ModelGeneratorService $modelGeneratorService,
        ControllerGeneratorService $controllerGeneratorService,
        MigrationGeneratorService $migrationGeneratorService,
        RouteGeneratorService $routeGeneratorService
    ) {
        $this->modelGeneratorService = $modelGeneratorService;
        $this->controllerGeneratorService = $controllerGeneratorService;
        $this->migrationGeneratorService = $migrationGeneratorService;
        $this->routeGeneratorService = $routeGeneratorService;
    }

    public function createPage(Request $request)
    {
        // Validate the request
        $request->validate([
            'table_name' => 'required|string|max:255',
            'columns' => 'required|array',
            'controller_name' => 'required|string|max:255',
            'functions' => 'required|array'
        ]);

        $tableName = $request->input('table_name');
        $columns = $request->input('columns');
        $controllerName = $request->input('controller_name');
        $functions = $request->input('functions');

        // Generate Model
        $this->modelGeneratorService->createModel($tableName, $columns);

        // Generate Controller
        $this->controllerGeneratorService->createController($controllerName, $functions);

        // Generate Migration
        $this->migrationGeneratorService->createMigration($tableName, $columns);

        // Generate Routes
        foreach ($functions as $function) {
            $this->routeGeneratorService->addRoute($controllerName, $function, 'web');
        }

        return response()->json(['message' => 'Page created successfully!']);
    }
}
