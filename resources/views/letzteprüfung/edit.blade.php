        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('letzteprüfung.update', $letzteprüfung->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Name
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="Name" id="Name" class="form-control" value="{{ $letzteprüfung->Name }}">
    </div>
</div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Discripe
        </div>
        <div class="col-12 pt-3">
            <textarea name="discripe" id="discripe" class="editor with-file-explorer">{{ $letzteprüfung->discripe }}</textarea>
        </div>
    </div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection