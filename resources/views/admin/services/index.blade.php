@extends('admin.BaseForms.BaseIndex', ['edit_route' => 'admin.services.edit',
 'delete_route' => 'admin.services.destroy','hasIcons'=>true])
@section('create_route')
    {{ route('admin.services.create') }}
@endsection
