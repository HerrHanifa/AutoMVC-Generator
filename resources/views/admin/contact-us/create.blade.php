@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" method="POST"
                action="{{ route('admin.contact_us.store') }}">
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
                                فاكس
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="fax"  maxlength="190" class="form-control"
                                    value="{{ old('fax') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                هاتف
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="phone"  maxlength="190" class="form-control"
                                    value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                بريد الإلكتروني
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="email"  maxlength="190" class="form-control"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                واتساب
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="whatsapp"  maxlength="190" class="form-control"
                                    value="{{ old('whatsapp') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                فيسبوك
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="facebook"  maxlength="190" class="form-control"
                                    value="{{ old('facebook') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                انستاغرام
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="instagram"  maxlength="190" class="form-control"
                                    value="{{ old('instagram') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                تويتر
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="twitter"  maxlength="190" class="form-control"
                                    value="{{ old('twitter') }}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                لينكدان
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="linkedin"  maxlength="190" class="form-control"
                                    value="{{ old('linkedin') }}">
                            </div>
                        </div>
                        <div class="col-12  p-2">
                            <div class="col-12">
                                خريطة
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="maps" class="editor with-file-explorer">{{ old('maps') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 p-2">
                            <div class="col-12">
                                ميتا الوصف
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="meta_description" class="form-control" style="min-height:150px">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 p-2">
                            <div class="col-12">
                                مميز
                            </div>
                            <div class="col-12 pt-3">
                                <select class="form-control" name="is_featured">
                                    <option @if (old('is_featured') == '0') selected @endif value="0">لا</option>
                                    <option @if (old('is_featured') == '1') selected @endif value="1">نعم</option>
                                </select>
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
