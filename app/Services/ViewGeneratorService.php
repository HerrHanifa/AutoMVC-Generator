<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Helpers\MigrationHelper;
use Illuminate\Support\Facades\Schema;

class ViewGeneratorService
{
    public function createViews($tableName, $fields, $requirdViews)
    {

        // dd($requirdViews);
        if (empty($requirdViews)) {
            return;
        }
        // dd($tableName);

        // جولة على المصفوفة واستدعاء الخدمات المناظرة
        foreach ($requirdViews as $view ) {

            switch ($view) {
                case 'index':
                    $this->createIndexView($tableName, $fields);
                    break;
                case 'create':
                    $this->createCreateView($tableName, $fields);
                    break;
                case 'edit':
                    $this->createEditView($tableName, $fields);
                    break;
                default:

                return redirect()->json('error', ' the value sending doesnt exist');
                    // التعامل مع الحالات غير المعرفة
                    // يمكنك هنا إظهار رسالة خطأ أو تسجيلها
                    break;
            }
        }


        // Update navigation
        $this->updateNavigation($tableName);


        return response()->json(['message' => 'Views created successfully']);
    }


    //ensure
    private function ensureDirectoryExists($filePath)
    {
        $directory = dirname($filePath);
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
    }

    //Create
    private function createCreateView($tableName, $fields)
    {
        $viewPath = resource_path("views/{$tableName}/create.blade.php");
        $this->ensureDirectoryExists($viewPath);
        $formFields = $this->generateFormFields($fields);
        $viewTemplate = $this->generateCreateViewTemplate($formFields, $tableName);
        File::put($viewPath, $viewTemplate);
    }





    //edit
    private function createEditView($tableName, $fields)
    {
        $viewPath = resource_path("views/{$tableName}/edit.blade.php");
        $this->ensureDirectoryExists($viewPath);
              $formFields = $this->generateFormFields($fields);
        $formFields = $this->generateFormFields($fields, true);
        $viewTemplate = $this->generateEditViewTemplate($formFields, $tableName);
        File::put($viewPath, $viewTemplate);
    }



    //Index
    private function createIndexView($tableName, $fields)
    {
        $viewPath = resource_path("views/{$tableName}/index.blade.php");
        $this->ensureDirectoryExists($viewPath);
        $viewTemplate = $this->generateIndexViewTemplate($fields, $tableName);
        File::put($viewPath, $viewTemplate);
    }



    //form
    private function generateFormFields($fields, $isEdit = false)
    {
        $formFields = '';
        foreach ($fields as $field) {
            $formFields .= $this->generateFieldTemplate($field, $isEdit);
        }
        return $formFields;
    }



 //Field Template
    private function generateFieldTemplate($field, $isEdit = false)
    {
        $fieldName = $field['name'];
        $fieldLabel = Str::title(str_replace('_', ' ', $fieldName));
        $value = $isEdit ? "{{ \$item->{$fieldName} }}" : "{{ old('{$fieldName}') }}";

        if ($field['type'] === 'text') {
            return <<<EOD
<div class="form-group">
    <label for="{$fieldName}">{$fieldLabel}</label>
    <textarea name="{$fieldName}" id="{$fieldName}" class="form-control">{$value}</textarea>
</div>

EOD;}


         if($field['type'] === 'string') {
            return <<<EOD
<div class="form-group">
    <label for="{$fieldName}">{$fieldLabel}</label>
    <input type="text" name="{$fieldName}" id="{$fieldName}" class="form-control" value="{$value}">
</div>

EOD;
        }
        else if ($field['type'] ==='file' ) {

            return <<<EOD
    <div class="form-group">
        <label for="{$fieldName}">{$fieldLabel}</label>
        <div class="col-12 p-2">
            <div class="col-12">{$fieldLabel}</div>
            <div class="col-12 pt-3">
                <input type="file" name="{$fieldName}_file" class="form-control" accept="image/*">
            </div>
            <div class="col-12 pt-3"></div>
        </div>
    </div>

    EOD;
        }
        else if($field['type'] === 'enum') {
            $options = '';
            foreach ($enumOptions as $option) {
                $selected = $isEdit ? "{{ \$item->{$fieldName} === '$option' ? 'selected' : '' }}" : "{{ old('$fieldName') === '$option' ? 'selected' : '' }}";
                $options .= "<option value=\"$option\" $selected>$option</option>";
            }

            return <<<EOD
        <div class="form-group">
        <label for="{$fieldName}">{$fieldLabel}</label>
        <select name="{$fieldName}" id="{$fieldName}" class="form-control">
            {$options}
        </select>
        </div>

        EOD;

                }
    }



    //create Template
    private function generateCreateViewTemplate($formFields, $tableName)
    {
        $routeName = Str::camel($tableName) . '.store';
        return <<<EOD
@extends('layouts.admin')

@section('content')
    <div class="col-12 p-3">
        <form action="{{ route('{$routeName}') }}" method="POST">
            @csrf
            {$formFields}
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
EOD;
    }



    //Edite template
    private function generateEditViewTemplate($formFields, $tableName)
    {
        $routeName = Str::camel($tableName).'.update';
        return <<< EOD
        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('{$routeName}', \$$tableName'->id') }}" method="POST">
                @csrf
                @method('PUT')
                {$formFields}
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        @endsection
EOD;
    }



    //Index Template
    private function generateIndexViewTemplate($fields, $tableName)
    {
        // dd($fields , $tableName);
        $items =  Str::plural($tableName);
        $viewFields = '';
        $fieldLabel = [];
        $viewLabel = '';
        $pathCreate = Str::camel($tableName).'.create';
        $pathEdit = Str::camel($tableName).'.edit';
        foreach ($fields as $field) {
            $fieldName = $field['name'];
            $fieldLabel = Str::title(str_replace('_', ' ',$fieldName ));
            $viewFields .= <<<EOD
                    <td>{{ \$$tableName->{$fieldName} }}</td>

EOD;
            $viewLabel .= <<<EOD
                    <th>{$fieldLabel}</th>

EOD;
        }
        // dd($fieldLabel , $fieldName2);
        return <<<EOD
    @extends('layouts.admin')

    @section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-articles"></span> <th style="width:150px;">{{$items}}</th>
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-endq">
                        <a href="{{route('$pathCreate')}}">
                        <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;">
                    <table class="table table-bordered  table-hover">
                        <thead>
                            <th>#</th>

                                {$viewLabel}

                            <th></th>
                        </thead>
                        <tbody>
                        @foreach(\$$items as \$$tableName)
                            <tr>
                                <td> </td>
                                {$viewFields}
                                <td>
                                    <a href="{{route('$pathEdit', \$$TableName'->id')}}">
                                        <span class="btn btn-outline-success btn-sm font-small mx-1"><span class="fas fa-wrench"></span> تعديل </span>
                                    </a>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 p-3">
            </div>
        </div>
    </div>
    @endsection
    EOD;
    }



    // navegation
    private function updateNavigation($tableName)
{
    $navPath = resource_path("views/layouts/admin.blade.php");
    $link = <<<EOD

                                    <li><a href="{{ route('{$tableName}.index') }}" style="font-size: 16px;"><span class="fal fa-book px-2" style="width: 28px;font-size: 15px;"></span>{$tableName}</a></li>
EOD;

    $currentNav = File::get($navPath);
    $insertPosition = strpos($currentNav, '<ul class="sub-item font-1"');
    $insertPosition = strpos($currentNav, '>', $insertPosition) + 1;

    $navWithNewLink = substr($currentNav, 0, $insertPosition) . $link . substr($currentNav, $insertPosition);

    File::put($navPath, $navWithNewLink);
}


}
