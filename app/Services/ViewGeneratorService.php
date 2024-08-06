<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Helpers\MigrationHelper;
use Illuminate\Support\Facades\Schema;

class ViewGeneratorService
{
    public function createViews($tableName)
    {
        $fields = Schema::getColumnListing($tableName);
        // $sortedFields = MigrationHelper::sortFields($fields);

        // Generate Create View
        $this->createCreateView($tableName, $sortedFields);

        // Generate Edit View
        // $this->createEditView($tableName, $sortedFields);

        // // Generate Show View
        // $this->createShowView($tableName, $sortedFields);

        return response()->json(['message' => 'Views created successfully']);
    }

    private function createCreateView($tableName, $fields)
    {
        $viewPath = resource_path("views/{$tableName}/create.blade.php");
        $formFields = $this->generateFormFields($fields);
        $viewTemplate = $this->generateCreateViewTemplate($formFields, $tableName);
        File::put($viewPath, $viewTemplate);
    }

    private function createEditView($tableName, $fields)
    {
        $viewPath = resource_path("views/{$tableName}/edit.blade.php");
        $formFields = $this->generateFormFields($fields, true);
        $viewTemplate = $this->generateEditViewTemplate($formFields, $tableName);
        File::put($viewPath, $viewTemplate);
    }

    private function createShowView($tableName, $fields)
    {
        $viewPath = resource_path("views/{$tableName}/show.blade.php");
        $viewTemplate = $this->generateShowViewTemplate($fields, $tableName);
        File::put($viewPath, $viewTemplate);
    }

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

        if (in_array($field['type'], ['text', 'longText', 'mediumText'])) {
            return <<<EOD
<div class="form-group">
    <label for="{$fieldName}">{$fieldLabel}</label>
    <textarea name="{$fieldName}" id="{$fieldName}" class="form-control">{$value}</textarea>
</div>

EOD;
        } else {
            return <<<EOD
<div class="form-group">
    <label for="{$fieldName}">{$fieldLabel}</label>
    <input type="text" name="{$fieldName}" id="{$fieldName}" class="form-control" value="{$value}">
</div>

EOD;
        }
    }

    private function generateCreateViewTemplate($formFields, $tableName)
    {
        $routeName = Str::plural($tableName) . '.store';
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

    private function generateEditViewTemplate($formFields, $tableName)
    {
        $routeName = Str::plural($tableName) . '.update';
        return <<<EOD
@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <form action="{{ route('{$routeName}', \$item->id) }}" method="POST">
        @csrf
        @method('PUT')
        {$formFields}
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
EOD;
    }

    private function generateShowViewTemplate($fields, $tableName)
    {
        $viewFields = '';
        foreach ($fields as $field) {
            $fieldName = $field['name'];
            $fieldLabel = Str::title(str_replace('_', ' ', $fieldName));
            $viewFields .= <<<EOD
        <div class="form-group">
            <label for="{$fieldName}">{$fieldLabel}</label>
            <p>{{ \$item->{$fieldName} }}</p>
        </div>

EOD;
        }

        return <<<EOD
@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    {$viewFields}
</div>
@endsection
EOD;
    }
}
