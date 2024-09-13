        @extends('layouts.admin')

        @section('content')
           <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 " >
            <form class="row" enctype="multipart/form-data" action="{{ route('headercode.update.web', $headercode->id) }}" method="POST">
                @csrf
                     <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> التعديل
                        </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                    <div class="col-12  p-2" >
        <div class="col-12">
            Facebook Pixel
        </div>
        <div class="col-12 pt-3">
            <textarea name="Facebook_Pixel" id="Facebook_Pixel" class="editor with-file-explorer">{{ $headercode->Facebook_Pixel }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Google Analytics
        </div>
        <div class="col-12 pt-3">
            <textarea name="Google_Analytics" id="Google_Analytics" class="editor with-file-explorer">{{ $headercode->Google_Analytics }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Google Ads Conversion Tracking
        </div>
        <div class="col-12 pt-3">
            <textarea name="Google_Ads_Conversion_Tracking" id="Google_Ads_Conversion_Tracking" class="editor with-file-explorer">{{ $headercode->Google_Ads_Conversion_Tracking }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Google Tag Manager
        </div>
        <div class="col-12 pt-3">
            <textarea name="Google_Tag_Manager" id="Google_Tag_Manager" class="editor with-file-explorer">{{ $headercode->Google_Tag_Manager }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Linkedin Insight Tag
        </div>
        <div class="col-12 pt-3">
            <textarea name="LinkedIn_Insight_Tag" id="LinkedIn_Insight_Tag" class="editor with-file-explorer">{{ $headercode->LinkedIn_Insight_Tag }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Twitter Pixel
        </div>
        <div class="col-12 pt-3">
            <textarea name="Twitter_Pixel" id="Twitter_Pixel" class="editor with-file-explorer">{{ $headercode->Twitter_Pixel }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Pinterest Tag
        </div>
        <div class="col-12 pt-3">
            <textarea name="Pinterest_Tag" id="Pinterest_Tag" class="editor with-file-explorer">{{ $headercode->Pinterest_Tag }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Hotjar Tracking Code
        </div>
        <div class="col-12 pt-3">
            <textarea name="Hotjar_Tracking_Code" id="Hotjar_Tracking_Code" class="editor with-file-explorer">{{ $headercode->Hotjar_Tracking_Code }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Crazy Egg Tracking Code
        </div>
        <div class="col-12 pt-3">
            <textarea name="Crazy_Egg_Tracking_Code" id="Crazy_Egg_Tracking_Code" class="editor with-file-explorer">{{ $headercode->Crazy_Egg_Tracking_Code }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Affiliate Tracking Codes
        </div>
        <div class="col-12 pt-3">
            <textarea name="Affiliate_Tracking_Codes" id="Affiliate_Tracking_Codes" class="editor with-file-explorer">{{ $headercode->Affiliate_Tracking_Codes }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Hubspot Tracking Code
        </div>
        <div class="col-12 pt-3">
            <textarea name="HubSpot_Tracking_Code" id="HubSpot_Tracking_Code" class="editor with-file-explorer">{{ $headercode->HubSpot_Tracking_Code }}</textarea>
        </div>
    </div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Snapchat Pixel
        </div>
        <div class="col-12 pt-3">
            <textarea name="Snapchat_Pixel" id="Snapchat_Pixel" class="editor with-file-explorer">{{ $headercode->Snapchat_Pixel }}</textarea>
        </div>
    </div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection