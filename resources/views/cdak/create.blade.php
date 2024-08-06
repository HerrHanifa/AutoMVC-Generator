@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <form action="{{ route('cdaks.store') }}" method="POST">
        @csrf
        <div class="form-group">
    <label for="ad">Ad</label>
    <input type="text" name="ad" id="ad" class="form-control" value="{{ old('ad') }}">
</div>
<div class="form-group">
    <label for="sac">Sac</label>
    <input type="text" name="sac" id="sac" class="form-control" value="{{ old('sac') }}">
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection