        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('test4.update.web', $test4->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Sac
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="sac" id="sac" class="form-control" value="{{ $test4->sac }}">
    </div>
</div>
<div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Ac
        </div>
        <div class="col-12 pt-3">
             <input type="datetime-local" name="ac" id="ac" class="form-control" value="{{ $test4->ac }}">
        </div>
</div>
                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection