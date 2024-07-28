@extends('admin.BaseForms.BaseIndex', ['edit_route' => 'admin.our_solution.edit',
 'delete_route' => 'admin.our_solution.destroy','hasIcons'=>true])
@section('create_route')
    {{ route('admin.our_solution.create') }}
@endsection
