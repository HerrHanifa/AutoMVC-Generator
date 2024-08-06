@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <form action="{{ route('finishes.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name" class="form-control" value="{{ $item->Name }}">
</div>
<div class="form-group">
    <label for="dicreibe">Dicreibe</label>
    <textarea name="dicreibe" id="dicreibe" class="form-control">{{ $item->dicreibe }}</textarea>
</div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection