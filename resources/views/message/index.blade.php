@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> <th style="width:150px;">{messages}</th>
                </div>
                <div class="col-12 col-lg-4 p-0">
                </div>
                <div class="col-12 col-lg-4 p-2 text-lg-endq">
                
                </div>
            </div>
            <div class="col-12 divider" style="min-height: 2px;"></div>
        </div>

        <div class="col-12 p-3" style="overflow:auto">
            <div class="col-12 p-0" style="min-width:1100px;">
                <table class="table table-bordered  table-hover">
                    <thead>
                        <th>#</th>

                                                <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Company</th>
                    <th>Message Content</th>


                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($messages as $messages)
                        <tr>
                            <td> </td>
                                                <td>{{ $messages->name }}</td>
                    <td>{{ $messages->email }}</td>
                    <td>{{ $messages->phone_number }}</td>
                    <td>{{ $messages->company }}</td>
                    <td>{{ $messages->message_content }}</td>

                            <td>
                                <a href="{{route('messages.edit.web', $messages->id)}}">
                                    <span class="btn btn-outline-success btn-sm font-small mx-1"><span class="fas fa-wrench"></span> تعديل </span>
                                </a>
                                       <a href="{{route('messages.delete.web', $messages->id)}}">
                                    <span class="btn btn-outline-danger  btn-sm font-small mx-1"><span class="fas fa-wrench"></span> حذف </span>
                                </a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 p-3">
        </div>
    </div>
</div>
@endsection