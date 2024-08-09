@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> <th style="width:150px;">{{$test2223s}}</th>
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
                                                <th>Name222</th>
                    <th>Nummer222</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($test2223s as $test2223)
                        <tr>
                            <td> </td>
                                                <td>{{ $test2223->Name222 }}</td>
                    <td>{{ $test2223->Nummer222 }}</td>

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