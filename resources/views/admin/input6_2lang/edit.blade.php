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
                            @yield('title_ar')
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_ar" required maxlength="190" class="form-control"
                                value="{{ $object->title_ar }}">
                             

                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                @yield('title_en')                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title_en"  maxlength="190" class="form-control"
                                value="{{ $object->title_en }}"  >
                            </div>
                        </div>
              
                         <div class="col-12 p-2">
                            <div class="col-12">
                           @yield('description1_ar')  
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="description1_ar" class="form-control" style="min-height:150px">{{ $object->description1_ar }}</textarea>
                            </div>
                          </div>
                           <div class="col-12 p-2">
                            <div class="col-12">
                                @yield('description1_en')  
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="description1_en" class="form-control" style="min-height:150px">{{ $object->description1_en }}</textarea>
                            </div>
                          </div>
                          <div class="col-12 p-2">
                            <div class="col-12">
                                @yield('description2_ar')  
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="description2_ar" class="form-control" style="min-height:150px">{{ $object->description2_ar }}</textarea>
                            </div>
                          </div>
                          <div class="col-12 p-2">
                            <div class="col-12">
                                @yield('description2_en')  
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="description2_en" class="form-control" style="min-height:150px">{{ $object->description2_en }}</textarea>
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
