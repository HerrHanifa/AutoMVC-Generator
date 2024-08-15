        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('alles5.update', $alles5->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Name
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="Name" id="Name" class="form-control" value="{{ $alles5->Name }}">
        </div>
    </div>
<div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Nummer
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="Nummer" id="Nummer" class="form-control" value="{{ $alles5->Nummer }}">
    </div>
</div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection