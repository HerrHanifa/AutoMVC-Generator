@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <!-- breadcrumb -->
        <x-bread-crumb :breads="[
            ['url' => url('/admin'), 'title' => 'لوحة التحكم', 'isactive' => false],
            ['url' => route('admin.Pages-maker.index'), 'title' => 'قواعد البيانات', 'isactive' => true],
        ]">
        </x-bread-crumb>
        <!-- /breadcrumb -->
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-migrations"></span> قواعد البيانات
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">

                        <a href="{{ route('admin.Pages-maker.create') }}">
                            <span class="btn btn-primary"><span class="fas fa-plus"></span> إنشاء جدول</span>
                        </a>

                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 py-2 px-2 row">
                <div class="col-12 col-lg-4 p-2">
                    <form method="GET">
                        <input type="text" name="q" class="form-control" placeholder="بحث ... "
                            value="{{ request()->get('q') }}">
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
                            @foreach ($migrations as $migration)
                                <tr>
                                    <td>{{ $migration->id }}</td>

                                    <td>{{ $table = substr_replace(substr_replace($migration->migration, '', 0, 25),'',-6) }}</td>


                                    <td>

                                        <a href="{{route('admin.Pages-maker.show',$table)}}">
                                            <span class="btn  btn-outline-primary btn-sm font-small mx-1">
                                                <span class="fas fa-search "></span> عرض
                                            </span>
                                        </a>

                                        <a href="#">
                                            <span class="btn  btn-outline-success btn-sm font-small mx-1">
                                                <span class="fas fa-wrench "></span> تعديل
                                            </span>
                                        </a>

                                        <form method="POST" action="#" class="d-inline-block">@csrf @method('DELETE')
                                            <button class="btn  btn-outline-danger btn-sm font-small mx-1"
                                                onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                                <span class="fas fa-trash "></span> حذف
                                            </button>
                                        </form>
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
