@extends('layouts.admin')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 " >
            <form class="row" enctype="multipart/form-data" action="{{ route('test4.store.web') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> إضافة جديد
                        </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    <div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Sac
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="sac" id="sac" class="form-control" value="{{ old('sac') }}">
    </div>
</div>
<div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Ac
        </div>
        <div class="col-12 pt-3">
             <input type="datetime-local" name="ac" id="ac" class="form-control" value="{{ old('ac') }}">
        </div>
</div>
                </div>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection