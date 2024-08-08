@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <form action="{{ route('lkemgnfslds.store') }}" method="POST">
        @csrf
        <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
</div>
<div class="form-group">
    <label for="fdg">Fdg</label>
    <input type="text" name="fdg" id="fdg" class="form-control" value="{{ old('fdg') }}">
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection