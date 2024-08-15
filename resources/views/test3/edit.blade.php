        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('test3.update.web', $test3->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="col-12  p-2" >
        <div class="col-12">
            Sx
        </div>
        <div class="col-12 pt-3">
            <textarea name="sx" id="sx" class="editor with-file-explorer">{{ $test3->sx }}</textarea>
        </div>
    </div>
<div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Nummer
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="Nummer" id="Nummer" class="form-control" value="{{ $test3->Nummer }}">
    </div>
</div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection