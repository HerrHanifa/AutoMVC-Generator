@extends('layouts.admin')
@section('content')

<section class="scetion_content_form">
    <div class="container">
        <form action="{{route('update.data' , $editUserWebsite->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="group_one row">
                <h2 class="font-weight-bold">البيانات الأساسية</h2>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label font-weight-bold">الاسم*</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                        value="{{$editUserWebsite->name}}">
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label font-weight-bold">رقم الجوال *</label>
                    <input type="text" class="form-control" name="phone" id="exampleFormControlInput1"
                        value="{{$editUserWebsite->phone}}">
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="form-label font-weight-bold">رقم الهوية الوطنية*</label>
                    <input type="text" class="form-control" name="national_id" id="exampleFormControlInput1"
                        value="{{$editUserWebsite->national_id}}">
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="font-weight-bold" style="font-family: Cairo !important;">العمل*</label>
                    <input type="text" name="job" class="form-control" value="{{$editUserWebsite->job}}">
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="font-weight-bold" style="font-family: Cairo !important;">اخر شهادة</label>
                    <select class="form-select font-weight-bold" name="lastCertification" aria-label="Default select example">
                        <option value="{{$editUserWebsite->lastCertification}}">{{$editUserWebsite->lastCertification}}</option>
                        <option value="دكتوراه وما يعدلها">دكتوراه وما يعدلها</option>
                        <option value="ماجستير وما يعدلها">ماجستير وما يعدلها</option>
                        <option value="بكالوريس">بكالوريس</option>
                        <option value="دبلوم مشارك تقني/مهني">دبلوم مشارك تقني/مهني</option>
                        <option value="التعليم الثانوي">التعليم الثانوي</option>
                        <option value="التعليم المتوسط">التعليم المتوسط</option>
                        <option value="التعليم الابتدائي">التعليم الابتدائي</option>
                        <option value="لم يلتحق">لم يلتحق</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6 col-sm-12">
                    <label class="font-weight-bold" style="font-family: Cairo !important;">نوع العضوية</label>
                    <select class="form-select font-weight-bold" name="typeOfSubscribing" aria-label="Default select example">
                        <option value="{{$editUserWebsite->typeOfSubscribing}}">{{$editUserWebsite->typeOfSubscribing}}</option>
                        <option value="عاملة">عاملة</option>
                        <option value="منتسبة">منتسبة</option>
                        <option value="شرفية">شرفية</option>
                        <option value="فخرية">فخرية</option>
                    </select>
                </div>



                <div class="form-check">
                    <input class="t" type="radio" name="gender" id="flexRadioDefault1" value="ذكر" {{$editUserWebsite->gender == 'ذكر' ? 'checked' : ''}}>
                    <label class="form-check-label me-4" for="flexRadioDefault1">
                      ذكر
                    </label>
                    <input class="t" type="radio" name="gender" id="flexRadioDefault2" value="انثى" {{$editUserWebsite->gender == 'انثى' ? 'checked' : ''}}>
                    <label class="form-check-label me-4" for="flexRadioDefault2">
                        انثى
                    </label>
                  </div>

                <div class="mb-3 font-weight-bold form-check">
                    <label class="font-weight-bold" style="font-family: Cairo !important;">هل يريد
                        العمل</label><br>
                    <input type="radio" class="ut" name="isWantWork" value="1" {{$editUserWebsite->isWantWork == 1 ? 'checked' : ''}}>
                    <label class="me-4" for="y">نعم</label>
                    <input type="radio" class="ut" name="isWantWork" value="0" {{$editUserWebsite->isWantWork == 0 ? 'checked' : ''}}>
                    <label class="me-4" for="e">لا</label>
                </div>
                <div class="mb-3">
                    <label for="formFileSm" class="form-label font-weight-bold">الصورة</label>
                    <input class="form-control font-weight-bold form-control-sm" name="img" id="formFileSm" type="file">
                    <img src="{{asset('images/' . $editUserWebsite->image)}}" alt="" width="40px">
                </div>

            </div>
            <button type="submit" class="btn btn-primary font-weight-bold">إرسال</button>
        </form>
    </div>

</section>


@endsection
