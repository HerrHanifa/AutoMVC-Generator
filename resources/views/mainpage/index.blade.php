@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> <th style="width:150px;">mainpages</th>
                </div>
                <div class="col-12 col-lg-4 p-0">
                </div>
                <div class="col-12 col-lg-4 p-2 text-lg-endq">

                                   <a href="{{ route('mainpage.create.web') }}">
                 <span class="btn btn-primary">
                     <span class="fas fa-plus"></span> إضافة جديد
                 </span>
              </a>

                </div>
            </div>
            <div class="col-12 divider" style="min-height: 2px;"></div>
        </div>

        <div class="col-12 p-3" style="overflow:auto">
            <div class="col-12 p-0" style="min-width:1100px;">
                <table class="table table-bordered  table-hover">
                    <thead>
                        <th>#</th>

                                                <th>Introduction</th>
                    <th>Introduction En</th>
                    <th>Keywords</th>
                    <th>Keywords En</th>
                    <th>Image</th>
                    <th>Video</th>
                    <th>Description Introduction</th>
                    <th>Description Introduction En</th>
                    <th>Description Meta</th>
                    <th>Description Meta En</th>
                    <th>Google Maps</th>


                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($mainpages as $mainpage)
                        <tr>
                            <td> </td>
                                                <td>{{ $mainpage->introduction }}</td>
                    <td>{{ $mainpage->introduction_en }}</td>
                    <td>{{ $mainpage->keywords }}</td>
                    <td>{{ $mainpage->keywords_en }}</td>
                    <td>{{ $mainpage->image }}</td>
                    <td>{{ $mainpage->video }}</td>
                    <td>{{ $mainpage->description_introduction }}</td>
                    <td>{{ $mainpage->description_introduction_en }}</td>
                    <td>{{ $mainpage->description_meta }}</td>
                    <td>{{ $mainpage->description_meta_en }}</td>
                    <td>{{ $mainpage->google_maps }}</td>

                            <td>
                                <a href="{{route('mainpage.edit.web', $mainpage->id)}}">
                                    <span class="btn btn-outline-success btn-sm font-small mx-1"><span class="fas fa-wrench"></span> تعديل </span>
                                </a>
                                       <a href="{{route('mainpage.delete.web', $mainpage->id)}}">
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