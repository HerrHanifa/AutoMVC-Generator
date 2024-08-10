@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> <th style="width:150px;">{test8s}</th>
                </div>
                <div class="col-12 col-lg-4 p-0">
                </div>
                <div class="col-12 col-lg-4 p-0">
                    <a href="{{route('test8.create')}}">
                    <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                    </a>
                </div>

            </div>
            <div class="col-12 divider" style="min-height: 2px;"></div>
        </div>

        <div class="col-12 p-3" style="overflow:auto">
            <div class="col-12 p-0" style="min-width:1100px;">
                <table class="table table-bordered  table-hover">
                    <thead>
                        <tr>#</tr>
                        <th>
                                                <th>Name</th>
                    <th>Description</th>

                        </tr>
                        <tr></tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                    @foreach($test8s as $test8)
                        <tr>
                            <td> </td>
                                                <td>{{ $test8->name }}</td>
                    <td>{{ $test8->description }}</td>

                        </tr>
                        <td>
                            <a href="{{route('test8.update')}}">
                                <span class="btn btn-primary"></span>تعديل</span>
                            </a>
                        </td>
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
