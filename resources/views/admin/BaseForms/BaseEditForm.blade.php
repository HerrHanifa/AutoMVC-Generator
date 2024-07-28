@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
            action="{{ route($update_route , $object->id) }}">
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
                                 الاسم بالعربي
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="arabicTitle" required maxlength="190" class="form-control"
                                    value={{ $object->arabicTitle }}>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                     الاسم بالانكليزي
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title"  maxlength="190" class="form-control"
                                    value={{ $object->title }}>
                            </div>
                        </div>
                        @if (!isset($doesntHaveImage))
                        <div class="col-12 p-2">
                            <div class="col-12">
                                الصورة الشخصية
                            </div>
                            <div class="col-12 pt-3">
                                <input type="file" name="icons" class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 pt-3">
                            </div>
                        </div>
                        @endif




                         <div class="col-12 p-2">
                            <div class="col-12">
المنصب بالعربي                             </div>
                            <div class="col-12 pt-3">
                                <textarea name="arabicPosition" class="form-control" style="min-height:150px">{{ $object->arabicPosition }}</textarea>
                            </div>
                          </div>
                           <div class="col-12 p-2">
                            <div class="col-12">
                                  المنصب بالإنجليزي
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="position" class="form-control" style="min-height:150px">{{ $object->position }}</textarea>
                            </div>
                          </div>


           
                    </div>
                    <div class="col-12 p-3 row">









                    </div>
                </div>
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection
