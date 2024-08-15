        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('sak1.update', $Sak1->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Sx
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="sx" id="sx" class="form-control" value="{{ $Sak1->sx }}">
    </div>
</div>
<div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Xs
        </div>
        <div class="col-12 pt-3">
             <input type="datetime-local" name="xs" id="xs" class="form-control" value="{{ $Sak1->xs }}">
        </div>
</div>
                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection