@extends('layouts.admin')

@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 " >
            <form class="row" enctype="multipart/form-data" action="{{ route('mainpage.store.web') }}" method="POST">
                @csrf
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
            Introduction
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="introduction" id="introduction" class="form-control" value="{{ old('introduction') }}">
        </div>
    </div>
    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Introduction En
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="introduction_en" id="introduction_en" class="form-control" value="{{ old('introduction_en') }}">
        </div>
    </div>
    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Keywords
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="keywords" id="keywords" class="form-control" value="{{ old('keywords') }}">
        </div>
    </div>
    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Keywords En
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="keywords_en" id="keywords_en" class="form-control" value="{{ old('keywords_en') }}">
        </div>
    </div>
<div class="form-group">
    <label for="image">Image</label>
    <div class="col-12 p-2">
        <div class="col-12">Image</div>
        <div class="col-12 pt-3">
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="col-12 pt-3"></div>
    </div>
</div>
<div class="form-group">
    <label for="video">Video</label>
    <div class="col-12 p-2">
        <div class="col-12">Video</div>
        <div class="col-12 pt-3">
            <input type="file" name="video" class="form-control" accept="image/*">
        </div>
        <div class="col-12 pt-3"></div>
    </div>
</div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Description Introduction
        </div>
        <div class="col-12 pt-3">
            <textarea name="description_introduction" id="description_introduction" class="editor with-file-explorer">{{ old('description_introduction') }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Description Introduction En
        </div>
        <div class="col-12 pt-3">
            <textarea name="description_introduction_en" id="description_introduction_en" class="editor with-file-explorer">{{ old('description_introduction_en') }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Description Meta
        </div>
        <div class="col-12 pt-3">
            <textarea name="description_meta" id="description_meta" class="editor with-file-explorer">{{ old('description_meta') }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Description Meta En
        </div>
        <div class="col-12 pt-3">
            <textarea name="description_meta_en" id="description_meta_en" class="editor with-file-explorer">{{ old('description_meta_en') }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Google Maps
        </div>
        <div class="col-12 pt-3">
            <textarea name="google_maps" id="google_maps" class="editor with-file-explorer">{{ old('google_maps') }}</textarea>
        </div>
    </div>

              
                <div class="col-9 px-2">
                <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection