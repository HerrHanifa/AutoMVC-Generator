 @extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <!-- breadcrumb -->
        <x-bread-crumb :breads="[
            ['url' => url('/admin'), 'title' => 'لوحة التحكم', 'isactive' => false],
            ['url' => route('admin.users.index'), 'title' => 'قاعدة البيانات', 'isactive' => false],
            ['url' => '#', 'title' => 'اضافة [جدول]', 'isactive' => true],
        ]">
        </x-bread-crumb>
        <!-- /breadcrumb -->
        {{-- <button id="myButton">اضغط هنا</button>

        <script>
            function myFunction() {
                // قم بتغيير لون الخلفية عند الضغط على الزر
                document.body.style.backgroundColor = "lightblue";
            }
        </script> --}}
        <form method="POST" action="{{ route('admin.migrations-maker.store') }}">
            @csrf
            <div>
                <label for="num_fields">عدد الحقول:</label>
                <input type="number" name="num_fields" id="num_fields">
                <button id="generate-fields">التالي</button>
            </div>
            <div id="fields-container"></div>
            <button type="submit" style="display: none;">إرسال</button>
        </form>




        <div class="col-12 col-lg-12 p-0 ">


            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.migrations-maker.store') }}">
                @csrf

                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> إضافة جديد
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">



                       {{-- <form method="POST" action="{{ route('process_form') }}">
                    @csrf
                        <div>
                            <label for="num_fields">عدد الحقول:</label>
                            <input type="number" name="num_fields" id="num_fields">
                            <button id="generate-fields">التالي</button>
                        </div>
                        <div id="fields-container"></div>
                        <div class="col-12 p-3">
                            <button class="btn btn-success" type="submit" style="display: none;">إرسال</button>
                        </div>
                        </form> --}}





                        {{-- <form method="POST" action="{{ route('admin.migrations-maker.store') }}">
                            @csrf
                            <div>
                                <label for="table_name">اسم الجدول:</label>
                                <input type="text" name="table_name" id="table_name">
                            </div>
                            <div>
                                <label for="column_count">عدد الأعمدة:</label>
                                <input type="number" name="column_count" id="column_count">
                            </div>
                            <div id="columns"></div>
                            <button type="submit">إنشاء Migration</button>
                        </form> --}}



                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                الاسم الجدول
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="name_table" required minlength="3" maxlength="190"
                                    class="form-control" value="{{ old('name_table') }}">
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                عدد الحقول
                            </div>
                            <div class="col-12 pt-3">
                                <input type="number" name="column_count" class="form-control"
                                    value="{{ old('column_count') }}">
                            </div>
                        </div>
                        <div class="col-12 p-3">
                            <button class="btn btn-success"  id="generate-fields">التالي</button>
                        </div>


                    </div>
                    <div class="col-12 p-3 row" id="columns"></div>
                </div>

                <div class="col-12 p-3">
                    <button class="btn btn-success" style="display: none;" id="submitEvaluation">حفظ</button>
                </div>
            </form>
            {{-- <script>
                $(document).ready(function() {
                    $('#generate-fields').click(function(e) {
                        e.preventDefault();
                        var numFields = $('#column_count').val();
                        $('#columns').empty();
                        for (var i = 1; i <= numFields; i++) {
                            $('#columns').append(`
                                <div class="col-12 col-lg-6 p-2">
                                    <div class="col-12">
                                      : ${i} العمود
                                    </div>
                                    <div class="col-12 pt-3">
                                        <input type="text" name="column[${i}][name]" class="form-control"
                                            value="{{ old('column[name]') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 p-2">
                                    <select class="col-12 pt-3 form-control select2-select" name="column[${i}][type]">
                                        <option value="string">نص</option>
                                        <option value="integer">عدد صحيح</option>
                                        <option value="text">نص طويل</option>
                                    </select>
                                </div>
                            `);
                        }
                        // عرض زر الإرسال بعد توليد الحقول
                        $('button[type="submit"]').show();
                    });
                });
            </script> --}}

             {{-- <script>
                            $(document).ready(function() {
                                $('#column_count').on('change', function() {
                                    var count = $(this).val();
                                    var columnsDiv = $('#columns');
                                    columnsDiv.empty();
                                    for (var i = 1; i <= count; i++) {
                                        columnsDiv.append(`
                                    <div>
                                        <label for="column_${i}_name">اسم العمود ${i}:</label>
                                        <input type="text" name="column_${i}_name" id="column_${i}_name">
                                        <label for="column_${i}_type">نوع البيانات:</label>
                                        <select name="column_${i}_type">
                                            <option value="string">نص</option>
                                            <option value="integer">عدد صحيح</option>
                                            <option value="text">نص طويل</option>
                                            </select>
                                    </div>
                                `);
                                    }
                                });
                            });
                        </script> --}}

            {{-- <script>
                $(document).ready(function() {
                    $('#column_count').on('change', function() {
                        var count = $(this).val();
                        var columnsDiv = $('#columns');
                        columnsDiv.empty();
                        for (var i = 1; i <= count; i++) {
                            columnsDiv.append(`
                            <div>
                                <label for="column_${i}_name">اسم العمود ${i}:</label>
                                <input type="text" name="column_${i}_name" id="column_${i}_name">
                                <label for="column_${i}_type">نوع البيانات:</label>
                                <select name="column_${i}_type">
                                    <option value="string">نص</option>
                                    <option value="integer">عدد صحيح</option>
                                    <option value="text">نص طويل</option>
                                    </select>
                            </div>
                        `);
                        }
                    });
                });
            </script> --}}
        </div>
    </div>


@endsection
