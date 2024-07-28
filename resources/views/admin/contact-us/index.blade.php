@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-articles"></span> خدمات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('articles-create')
					<a href="{{route('admin.contact_us.create')}}">
						{{-- <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span> --}}
					</a>
					@endcan
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
						{{-- <th>خريطة</th> --}}
						<th>فاكس</th>
                        <th>هاتف</th>
                        <th>بريد الالكتروني</th>
                        <th>واتساب</th>
                        <th>فيسبوك</th>
                        <th>انستاغرام</th>
                        <th>لينكدان</th>
                        <th>تويتر</th>
                        <th>العنوان بالعربي</th>
                        <th>العنوان بالإنجليزي</th>
						<th>تحكم</th>

					</tr>
				</thead>
				<tbody>
					@foreach($contact as $item)
					<tr>
						<td>{{$item->id}}</td>

						{{-- <td>{{$item->maps}}</td> --}}
                        <td>{{$item->fax}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->whatsapp}}</td>
                        <td>{{$item->facebook}}</td>
                        <td>{{$item->instagram}}</td>
                        <td>{{$item->twitter}}</td>
                        <td>{{$item->linkedin}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->arabicLocation}}</td>

						<td style="width: 360px;">

							@can('articles-update')
							<a href="{{route('admin.contact_us.edit',$item->id)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							@endcan
							@can('articles-delete')
							{{-- <form method="POST" action="{{route('admin.contact_us.destroy',$item->id)}}" class="d-inline-block">
                                @csrf
                                @method("DELETE")
                                <!-- Add a hidden input field with the value set to "DELETE" -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                    <span class="fas fa-trash"></span> حذف
                                </button>
                            </form> --}}
							@endcan
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{-- {{$articles->appends(request()->query())->render()}} --}}
		</div>
	</div>
</div>
@endsection
