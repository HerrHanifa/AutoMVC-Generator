@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.slider.update', $slide->id) }}">
                @csrf

                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> إضافة جديد
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">



                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                 نص للهيدر بالعربي
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="arabicText" required maxlength="190" class="form-control"
                                    value="{{ $slide->arabicText }}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-12 p-2">
                            <div class="col-12">
                                 نص للهيدر بالانجليزي
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="text" required maxlength="190" class="form-control"
                                    value="{{ $slide->text }}">
                            </div>
                        </div>




                        <div class="col-12 p-2">
                            <div class="col-12">
                                صورة
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="pictures" class="form-control" accept="image/*">
                                <img src="{{asset('uploading/'. $slide->pictures)}}" style="width:40px">
                            </div>
                            <div class="col-12 pt-3">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection
