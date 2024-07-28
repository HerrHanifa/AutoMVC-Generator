@extends('layouts.admin')

@section('content')
<style>
    .name-box {
    width: 400px;
    height: 50px;
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 10px;
}
.phoneNumber-box {
    width: 400px;
    height: 50px;
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 10px;
}
.email-box {
    width: 400px;
    height: 50px;
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 10px;
}
.message-box {
    width: 400px;
    height: 200px;
    border: 1px solid #000;
    padding: 10px;
    margin-bottom: 10px;
}
.back-button {
        position: absolute;
        left: 20px;
        width: 75px;
        background-color: blue;
        color: white;
    }
</style>

<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> الرسالة
                </div>
                <div class="col-12 col-lg-4 py-3 px-3">
                    <a href="{{ url()->previous() }}" class="btn back-button">عودة</a>
                </div>
            </div>
            <div class="col-12 divider" style="min-height: 2px;"></div>
        </div>

        <div class="col-12 p-3">
            <div class="col-12 p-0">
                <label>الاسم:</label>
                <div class="name-box">

                    <p>{{ $message->name }}</p>
                </div>
                <label>رقم الهاتف:</label>
                <div class="phoneNumber-box">

                    <p>{{ $message->phoneNumber }}</p>
                </div>
                <label>البريد الالكتروني:</label>
                <div class="email-box">

                    <p>{{ $message->email }}</p>
                </div>
                <label>النص:</label>
                <div class="message-box">

                    <p>{{ $message->message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
