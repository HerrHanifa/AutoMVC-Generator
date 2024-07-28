@extends('admin.BaseForms.BaseIndex', ['edit_route' => 'admin.clients.edit',
 'delete_route' => 'admin.clients.destroy','hasIcons'=>true])

@section('create_route')
    {{ route('admin.clients.create') }}
@endsection
