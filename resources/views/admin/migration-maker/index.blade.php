@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'لوحة التحكم' , 'isactive' => false],
			['url' => route('admin.migrations-maker.index') , 'title' => 'قواعد البيانات' , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-migrations"></span>	قواعد البيانات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">

					<a href="#">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إنشاء جدول</span>
					</a>

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
			<div class="col-12 p-0" style="min-width:1100px;min-height: 600px;">


			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الجدول</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($migrations as $migration)
					<tr>
						<td>{{$migration->id}}</td>

						<td>{{substr_replace($migration->migration, '', 0 , 25 )}}</td>
						{{-- <td>{{$migration->email}}</td> --}}

						{{-- @if(auth()->migration()->can('articles-read'))
						<td><a href="{{route('admin.articles.index',['migration_id'=>$migration->id])}}">{{$migration->articles_count}}</a></td>
						@endif
						@if(auth()->migration()->can('contacts-read'))
						<td><a href="{{route('admin.contacts.index',['migration_id'=>$migration->id])}}">{{$migration->contacts_count}}</a></td>
						@endif
						@if(auth()->migration()->can('comments-read'))
						<td><a href="{{route('admin.article-comments.index',['migration_id'=>$migration->id])}}">{{$migration->comments_count}}</a></td>
						@endif
						@if(auth()->migration()->can('traffics-read'))
						<td><a href="{{route('admin.traffics.logs',['migration_id'=>$migration->id])}}">{{$migration->logs_count}}</a></td>
						@endif --}}


						{{-- <td>@foreach($migration->roles as $role) {{$role->display_name}}<br> @endforeach</td> --}}


						<td>

							<a href="#">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> عرض
							</span>
							</a>





							{{-- @can('notifications-create')
							<a href="{{route('admin.notifications.index',['migration_id'=>$migration->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="far fa-bells"></span> الاشعارات
							</span>
							</a> --}}
							{{-- <a href="{{route('admin.notifications.create',['migration_id'=>$migration->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="far fa-bell"></span>
							</span>
							</a>
							@endcan --}}

							{{-- @can('migration-roles-update')
							<a href="{{route('admin.migrations.roles.index',$migration)}}">
							<span class="btn btn-outline-primary btn-sm font-small mx-1">
								<span class="fal fa-key "></span> الصلاحيات
							</span>
							</a>
							@endcan --}}


							<a href="#">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> تعديل
							</span>
							</a>




							<form method="POST" action="#" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-small mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>




							{{-- <div class="dropdown d-inline-block">
								<button class="py-1 px-2 btn btn-outline-primary font-small" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
								<span class="fas fa-bars"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29px, 0px);">
								@can('migrations-update')
								<li><a class="dropdown-item font-1" href="{{route('admin.migrations.access',$migration)}}"><span class="fal fa-eye"></span> دخول</a></li>
								@endcan



								@can('migrations-update')
								<li><a class="dropdown-item font-1" href="{{route('admin.traffics.logs',['migration_id'=>$migration->id])}}"><span class="fal fa-boxes"></span> مراقبة النشاط <span class="badge bg-danger">{{$migration->logs_count}}</span></a></li>
								@endcan
								</ul>
								</div>


						</td> --}}
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		{{-- <div class="col-12 p-3">
			{{$migrations->appends(request()->query())->render()}}
		</div> --}}
	</div>
</div>
@endsection
