        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('dieErsteErfahrung213.update', $die Erste Erfahrung213->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="col-12  p-2" >
        <div class="col-12">
            Sa
        </div>
        <div class="col-12 pt-3">
            <textarea name="sa" id="sa" class="editor with-file-explorer">{{ $die Erste Erfahrung213->sa }}</textarea>
        </div>
    </div>
<div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Discripe
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="discripe" id="discripe" class="form-control" value="{{ $die Erste Erfahrung213->discripe }}">
    </div>
</div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection