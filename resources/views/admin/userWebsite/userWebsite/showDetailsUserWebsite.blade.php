@extends('layouts.admin')
@section('content')
<div class="col-12 py-3">
	<div class="container">
		<div class="p-3 main-box mx-auto" style="width:600px;max-width: 100%;">
			<div class="d-flex align-items-center justify-content-center py-4">
			 	<div class="col-12 d-flex justify-content-center align-items-center mx-auto " style="width:100%">
			 		<div class="col-12 p-0 text-center">
				 		<img src="{{ $UserWebsite->image()}}" style="width:120px;max-width: 100%;border-radius: 50%;" class="d-inline-block">
				 		<div class="col-12 font-3 text-center py-2">
                            @isset($UserWebsite){{$UserWebsite->name}} @endisset
				 		</div>
			 		</div>
			 		
			 	</div>
			 	
			</div>
			<div class="col-12 p-0">
				<table class="table table-bordered table-striped rounded table-hover">
					<tbody>
						<tr>
							<td>الرقم الهاتف</td>
						<td>@isset($UserWebsite){{$UserWebsite->phone}} @endisset</td>
						</tr>
						<tr>
							<td>الرقم الوطني</td>
							<td>
                                @isset($UserWebsite){{$UserWebsite->national_id}} @endisset
							</td>
						</tr>
						<tr>
							<td> أخر شهادة</td>
                            <td>   @isset($UserWebsite){{$UserWebsite->lastCertification}} @endisset	</td>
						</tr>
						<tr>
							<td>الجنس</td>
							<td>
			 @isset($UserWebsite){{$UserWebsite->gender}} @endisset

						</td>
                    </tr>
						<tr>
							<td>هل يرغب بالعمل</td>
							<td>
                                @isset($UserWebsite)@if($UserWebsite->isWantWork){{"يريد العمل" }} @elseif($UserWebsite->isWantWork){{"لايريد"}}@endif @endisset  
							</td>
						</tr>

                        <tr>
							<td> نوع العضوية</td>
							<td>
                                @isset($UserWebsite){{$UserWebsite->typeOfSubscribing}} @endisset  
							</td>
						</tr>
						
						<tr>
							<td>تحكم</td>
							<td><a href="{{route('admin.profile.edit')}}" class="rounded-0 btn btn-success btn-sm border"><span class="fal fa-wrench"></span> تعديل</a></td>
						</tr>

						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection