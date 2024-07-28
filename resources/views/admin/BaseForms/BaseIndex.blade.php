@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-articles"></span> <th style="width:150px;">{{$name}} </th>
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('articles-create')
                    <a href="@yield('create_route')">
						<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
					@endcan
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
                        @if ($hasIcons)
                        <th>الصورة الشخصية</th>
                        @endif
                        <th style="width:150px;">الاسم بالعربي</th>
                        <th style="width:150px;">الاسم بالانكليزي</th>
                        <th style="width:400px;">المنصب بالعربي</th>
                        <th style="width:400px;">المنصب بالانكليزي</th>
                        <th style="width:200px;">تحكم</th>

					</tr>
				</thead>
				<tbody>
					@foreach($objects as $object)
					<tr>
						<td>{{$object->id}}</td>
                        @if ($hasIcons)
                        <td><img src="{{asset('serImage/'. $object->icons)}}" style="width:40px"></td>
                        @endif
                        <td style="width:150px;">{{ $object->arabicTitle }}</td>
                        <td style="width:150px;">{{ $object->title }}</td>
                        <td style="width:400px;">{{ $object->arabicPosition }}</td>
                        <td style="width:400px;">{{ $object->position }}</td>
						<td style="width: 200px;">

                            @can('articles-update')
                            <a href="{{ route($edit_route, $object->id) }}">
                                <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                    <span class="fas fa-wrench "></span> تحكم
                                </span>
                            </a>
                            @endcan
                            @can('articles-delete')
                            <form method="POST" action="{{ route($delete_route, $object->id) }}" class="d-inline-block">
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
