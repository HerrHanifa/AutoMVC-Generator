<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrationController extends Controller
{

    public function __construct()
    {

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
        // dd($migrations_name);

        return view('admin.migration-maker.create' , compact('migrations_name'));
    }
    public function store(Request $request){
        return $request;
    }
    public function show(Request $request){
        $table_name = $request->table;
        // dd($table);
        $columns = Schema::getColumnListing($table_name);
        // dd($table_name , $columns);
        $data = DB::table($table_name)->limit(10)->get();
        return view('admin.migration-maker.show',compact('columns' , 'data' , 'table_name'));
    }


}
