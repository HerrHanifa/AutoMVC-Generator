@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-articles"></span> الواجهة الرئيسية
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
                        <th>نص هيدر بالعربي</th>
                        <th>نص هيدر بالانجليزي</th>
						<th>صورة</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($slide as $item)
					<tr>
						<td>{{$item->id}}</td>
                        <td>{{$item->arabicText}}</td>
                        <td>{{$item->text}}</td>
						<td><img src="{{asset('serImage/'. $item->pictures)}}" style="width:40px"></td>

						<td style="width: 360px;">

							@can('articles-update')
							<a href="{{route('admin.slider.edit',$item->id)}}">
								<span class="btn  btn-outline-success btn-sm font-1 mx-1">
									<span class="fas fa-wrench "></span> تحكم
								</span>
							</a>
							@endcan
							@can('articles-delete')
							<form method="POST" action="{{route('admin.slider.destroy', $item->id)}}" class="d-inline-block">
                                @csrf
                                @method("DELETE")
                                <!-- Add a hidden input field with the value set to "DELETE" -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                    <span class="fas fa-trash"></span> حذف
                                </button>
                            </form>
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
