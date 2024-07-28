@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-pages"></span> أعضاء المشتركين
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>

			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الاسم</th>
						<th>الرقم الهاتف</th>
						<th>العمل</th>
						<th>الجنس</th>
						<th>العضوية</th>
                        <th> الصورة</th>
					</tr>
				</thead>
				<tbody>
					@foreach($userswebsite as $userwebsite)
					<tr>
						<td>{{$userwebsite->id}}</td>
						<td>{{$userwebsite->name}}</td>
						<td>{{$userwebsite->phone}}</td>
						<td>{{$userwebsite->job}}</td>
                        <td>{{$userwebsite->gender}}</td>
                        <td>{{$userwebsite->typeOfSubscribing}}</td>
                        <td><img src="{{asset('images/' . $userwebsite->image)}}" style="width:40px"></td>
						<td style="width: 270px;">


							<a href="{{route('functionshowDetailsUserWebsite',['id'=>$userwebsite->id])}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> عرض
								</span>
							</a>
                            <a href="{{route('edit.data',['id'=>$userwebsite->id])}}">
								<span class="btn  btn-outline-success btn-sm font-small mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
                            <form method="POST" action="{{route('destroy.data',['id'=>$userwebsite->id])}}" class="d-inline-block">
                                @csrf
                                <button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                <span class="fas fa-trash"></span> حذف
                                </button>
                            </form>


							{{-- @can('pages-update')
							<a href="{{route('admin.pages.edit',$page)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							@endcan --}}
							{{-- @can('pages-delete') --}}
							{{-- <form method="POST" action="{{route('admin.pages.destroy',$userwebsite)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form> --}}
							{{-- @endcan --}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$userswebsite->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
