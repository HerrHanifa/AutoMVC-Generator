@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 main-box">
        <div class="col-12 px-0">
            <div class="col-12 p-0 row">
                <div class="col-12 col-lg-4 py-3 px-3">
                    <span class="fas fa-articles"></span> <th style="width:150px;">{headercodes}</th>
                </div>
                <div class="col-12 col-lg-4 p-0">
                </div>
                <div class="col-12 col-lg-4 p-2 text-lg-endq">
                    <a href="{{route('headercode.create.web')}}">
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
                        <th>#</th>

                                                <th>Facebook Pixel</th>
                    <th>Google Analytics</th>
                    <th>Google Ads Conversion Tracking</th>
                    <th>Google Tag Manager</th>
                    <th>Linkedin Insight Tag</th>
                    <th>Twitter Pixel</th>
                    <th>Pinterest Tag</th>
                    <th>Hotjar Tracking Code</th>
                    <th>Crazy Egg Tracking Code</th>
                    <th>Affiliate Tracking Codes</th>
                    <th>Hubspot Tracking Code</th>
                    <th>Snapchat Pixel</th>


                        <th></th>
                    </thead>
                    <tbody>
                    @foreach($headercodes as $headercode)
                        <tr>
                            <td> </td>
                                                <td>{{ $headercode->Facebook_Pixel }}</td>
                    <td>{{ $headercode->Google_Analytics }}</td>
                    <td>{{ $headercode->Google_Ads_Conversion_Tracking }}</td>
                    <td>{{ $headercode->Google_Tag_Manager }}</td>
                    <td>{{ $headercode->LinkedIn_Insight_Tag }}</td>
                    <td>{{ $headercode->Twitter_Pixel }}</td>
                    <td>{{ $headercode->Pinterest_Tag }}</td>
                    <td>{{ $headercode->Hotjar_Tracking_Code }}</td>
                    <td>{{ $headercode->Crazy_Egg_Tracking_Code }}</td>
                    <td>{{ $headercode->Affiliate_Tracking_Codes }}</td>
                    <td>{{ $headercode->HubSpot_Tracking_Code }}</td>
                    <td>{{ $headercode->Snapchat_Pixel }}</td>

                            <td>
                                <a href="{{route('headercode.edit.web', $headercode->id)}}">
                                    <span class="btn btn-outline-success btn-sm font-small mx-1"><span class="fas fa-wrench"></span> تعديل </span>
                                </a>
                                       <a href="{{route('headercode.delete.web', $headercode->id)}}">
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