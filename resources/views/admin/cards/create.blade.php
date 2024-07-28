@extends('admin.BaseForms.BaseForm' ,['doesntHaveImage' => true])

@section('form_action')
        {{ route('admin.cards.store') }}
@endsection

