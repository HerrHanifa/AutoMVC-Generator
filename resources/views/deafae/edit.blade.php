        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('deafae.update.web', $deafae->id) }}" method="POST">
                @csrf
            
                <div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Ad
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="ad" id="ad" class="form-control" value="{{ $deafae->ad }}">
    </div>
</div>
<div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Sad
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="sad" id="sad" class="form-control" value="{{ $deafae->sad }}">
    </div>
</div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection