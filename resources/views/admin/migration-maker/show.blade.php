@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => 'لوحة التحكم' , 'isactive' => false],
			['url' => route('admin.migrations-maker.index') , 'title' => 'قواعد البيانات' , 'isactive' => false],
			['url' => route('admin.migrations-maker.show',$table_name) , 'title' => $table_name , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-migrations"></span>
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
			<div class="col-12 p-0" style="min-width:1100px;min-height: 600px;">



			<table class="table table-bordered  table-hover">
				<thead>
                    <tr>
                        @foreach ($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                    </tr>
				</thead>
				<tbody>
					@foreach ($data as $row)
            <tr>
                @foreach ($columns as $column)
                    <td>{{ $row->$column }}</td>
                @endforeach
            </tr>
        @endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
@endsection
