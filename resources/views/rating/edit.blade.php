        @extends('layouts.admin')

        @section('content')
           <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 " >
            <form class="row" enctype="multipart/form-data" action="{{ route('rating.update.web', $rating->id) }}" method="POST">
                @csrf
                     <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> التعديل
                        </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Name
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="name" id="name" class="form-control" value="{{ $rating->name }}">
        </div>
    </div>
    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Name En
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="name_en" id="name_en" class="form-control" value="{{ $rating->name_en }}">
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Description
        </div>
        <div class="col-12 pt-3">
            <textarea name="description" id="description" class="editor with-file-explorer">{{ $rating->description }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Description En
        </div>
        <div class="col-12 pt-3">
            <textarea name="description_en" id="description_en" class="editor with-file-explorer">{{ $rating->description_en }}</textarea>
        </div>
    </div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection