@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <form action="{{ route('ans.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
    <label for="string">String</label>
    <textarea name="string" id="string" class="form-control">{{ $item->string }}</textarea>
</div>
<div class="form-group">
    <label for="stringe">Stringe</label>
    <input type="text" name="stringe" id="stringe" class="form-control" value="{{ $item->stringe }}">
</div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection