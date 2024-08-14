        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('zakortest3.update', $zakortest3->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name" class="form-control" value="{{ $zakortest3->Name }}">
</div>
<div class="form-group">
    <label for="discripe">Discripe</label>
    <textarea name="discripe" id="discripe" class="form-control">{{ $zakortest3->discripe }}</textarea>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <input type="text" name="status" id="status" class="form-control" value="{{ $zakortest3->status }}">
</div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        @endsection