        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('zakortest8.update', $zakortest8->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name" class="form-control" value="{{ $zakortest8->Name }}">
</div>
<div class="form-group">
    <label for="discripe">Discripe</label>
    <textarea name="discripe" id="discripe" class="form-control">{{ $zakortest8->discripe }}</textarea>
</div>
<div class="form-group">
    <label for="date">Date</label>
    <input type="datetime-local" name="date" id="date" class="form-control" value="{{ $zakortest8->date }}">
</div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        @endsection