        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('Test100.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
</div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        @endsection