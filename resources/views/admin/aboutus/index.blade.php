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

			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>


		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">


			<table class="table table-bordered  table-hover">
				<thead>
                    <tr>
						<th>#</th>

                        <th style="width:150px;">نبذة بالعربي</th>
                        <th style="width:150px;">نبذة بالانكليزي</th>
                        <th style="width:400px;">الرسالة بالعربي </th>
                        <th style="width:400px;">الرسالة بالانجلش</th>
						<th style="width:400px;">الرؤية  بالعربي </th>
                        <th style="width:400px;">الرؤية بالانجلش</th>
                        <th style="width:200px;">تحكم</th>

					</tr>
				</thead>
				<tbody>
					@foreach($objects as $object)
					<tr>
						<td>{{$object->id}}</td>

                        <td style="width:150px;">{{ $object->title_ar }}</td>
                        <td style="width:150px;">{{ $object->title_en }}</td>
                        <td style="max-width:400px; word-wrap: break-word;">{{ $object->description1_ar }}</td>
                        <td style="max-width:400px;word-wrap: break-word;">{{ $object->description1_en }}</td>
						<td style="max-width:400px;word-wrap: break-word;">{{ $object->description2_ar }}</td>
                        <td style="max-width:400px;word-wrap: break-word;">{{ $object->description2_en }}</td>
						<td style="width: 200px;">

                            @can('articles-update')
                            <a href="{{route('admin.aboutus.edit',$object->id)}}">

                                <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                    <span class="fas fa-wrench "></span> تحكم
                                </span>
                            </a>
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
