@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <form action="{{ route('ans.store') }}" method="POST">
        @csrf
        <div class="form-group">
    <label for="string">String</label>
    <textarea name="string" id="string" class="form-control">{{ old('string') }}</textarea>
</div>
<div class="form-group">
    <label for="stringe">Stringe</label>
    <input type="text" name="stringe" id="stringe" class="form-control" value="{{ old('stringe') }}">
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection