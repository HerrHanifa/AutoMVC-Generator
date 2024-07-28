@extends('admin.BaseForms.BaseIndex', ['edit_route' => 'admin.cards.edit',
 'delete_route' => 'admin.cards.destroy','hasIcons'=>false])

@section('create_route')
    {{ route('admin.cards.create') }}
@endsection
