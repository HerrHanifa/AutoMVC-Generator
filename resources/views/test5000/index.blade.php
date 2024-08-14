@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> <th style="width:150px;">{{$test5000s}}</th>
                </div>
                <div class="col-12 col-lg-4 p-0">
                </div>
            </div>
            <div class="col-12 divider" style="min-height: 2px;"></div>
        </div>

        <div class="col-12 p-3" style="overflow:auto">
            <div class="col-12 p-0" style="min-width:1100px;">
                <table class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                                                <th>Name</th>
                    <th>Nummer</th>
                    <th>Tags Id</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($test5000s as $test5000)
                        <tr>
                            <td> </td>
                                                <td>{{ $test5000->Name }}</td>
                    <td>{{ $test5000->Nummer }}</td>
                    <td>{{ $test5000->tags_id }}</td>

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