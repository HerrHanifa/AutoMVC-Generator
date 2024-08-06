@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <form action="{{ route('finishes.store') }}" method="POST">
        @csrf
        <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name') }}">
</div>
<div class="form-group">
    <label for="dicreibe">Dicreibe</label>
    <textarea name="dicreibe" id="dicreibe" class="form-control">{{ old('dicreibe') }}</textarea>
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection