@extends('admin.BaseForms.BaseForm')

@section('form_action')
    {{ route('admin.services.store') }}
@endsection
