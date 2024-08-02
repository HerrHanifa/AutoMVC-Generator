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
                         <div class="col-12 col-lg-6 p-2">
                             <div class="col-12">
                                 الاسم الجدول
                             </div>
                             <div class="col-12 pt-3">
                                 <input type="text" name="name_table" required minlength="3" maxlength="190"
                                     class="form-control" value="{{ old('name_table') }}">
                             </div>
                         </div>
                         <div class="col-12 col-lg-6 p-2 row">
                             <label class="col-9" for="num_fields">عدد الحقول:</label>
                             <div class="col-9 pt-3">
                                 <input type="number" name="column_count" id="column_count" class="form-control">
                             </div>
                             <div class="col-3 pt-3">
                                 <button class=" btn btn-success" id="generate-fields">التالي</button>
                             </div>
                         </div>

                     </div>
                     <div name="column" id="fields-container"></div>
                     <div class="col-12 p-3">
                         <button type="button" id="add-relation" class="btn btn-primary">إضافة علاقة</button>
                     </div>
                     <div id="relations-container"></div>

                     <div class="col-12 p-3">
                         <button type="submit" style="display: none;" class=" btn btn-success">إنشاء</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <script>
         document.addEventListener('DOMContentLoaded', () => {
             const generateButton = document.getElementById('generate-fields');
             const columnsContainer = document.getElementById('fields-container');
             const addRelationButton = document.getElementById('add-relation');
             const relationsContainer = document.getElementById('relations-container');

             generateButton.addEventListener('click', (e) => {
                 e.preventDefault();
                 const numFields = document.getElementById('column_count').value;
                 columnsContainer.innerHTML = '';

                 for (let i = 1; i <= numFields; i++) {
                     const columnDiv = document.createElement('div');
                     columnDiv.classList.add('col-12', 'col-lg-6', 'p-2', 'row');

                     const labelDiv = document.createElement('div');
                     labelDiv.classList.add('col-12');
                     labelDiv.textContent = `العمود ${i}`;
                     columnDiv.appendChild(labelDiv);

                     const inputDiv = document.createElement('div');
                     inputDiv.classList.add('col-12', 'pt-3');

                     const nameInput = document.createElement('input');
                     nameInput.type = 'text';
                     nameInput.name = `column[${i}][name]`;
                     nameInput.classList.add('form-control');
                     nameInput.value = '{{ old('column[name]') }}'; // استبدل هذا بالقيمة الافتراضية المناسبة
                     inputDiv.appendChild(nameInput);

                     columnDiv.appendChild(inputDiv);

                     const selectDiv = document.createElement('div');
                     selectDiv.classList.add('col-12', 'pt-3');

                     const typeSelect = document.createElement('select');
                     typeSelect.classList.add('form-control', 'select2-select');
                     typeSelect.name = `column[${i}][type]`;

                     const stringOption = document.createElement('option');
                     stringOption.value = 'string';
                     stringOption.textContent = 'نص';
                     typeSelect.appendChild(stringOption);

                     const integerOption = document.createElement('option');
                     integerOption.value = 'integer';
                     integerOption.textContent = 'عدد صحيح';
                     typeSelect.appendChild(integerOption);

                     const textOption = document.createElement('option');
                     textOption.value = 'text';
                     textOption.textContent = 'نص طويل';
                     typeSelect.appendChild(textOption);

                     selectDiv.appendChild(typeSelect);
                     columnDiv.appendChild(selectDiv);

                     columnsContainer.appendChild(columnDiv);
                 }

                 // عرض زر الإرسال بعد توليد الحقول
                 document.querySelector('button[type="submit"]').style.display = 'block';
             });
             addRelationButton.addEventListener('click', (event) => {
                 const numFields = document.getElementById('column_count').value;
//اسناد قيم الاعمدة الى متغير
                     const inputs = document.querySelectorAll('input[name^="column"]');
                     columnData = [];

                     inputs.forEach(input => {
                         columnData.push({
                             name: input.value
                         });
                     });
                     var migrations = @json($migrations_name);

                     columnsContainer.innerHTML = '';
                     relationsContainer.innerHTML = '';


                 const relationDiv = document.createElement('div');
                 relationDiv.classList.add('col-12', 'col-lg-6', 'p-2', 'row');

                 //select ال foreign key
                 const selectForeignkey = document.createElement('div');
                 selectForeignkey.classList.add('col-12', 'pt-3');
                    const selectDiv = document.createElement('select');
                    selectDiv.classList.add('form-control', 'select2-select');
                    selectDiv.name = `relations[][column_name]`;

                    columnData.forEach (column => {
                        const Option = document.createElement('option');
                        Option.value = column.name;
                        Option.textContent = column.name;
                        selectDiv.appendChild(Option);
                    });

                    selectForeignkey.appendChild(selectDiv);
                    relationDiv.appendChild(selectForeignkey);

                    // select for table

                    const selectTable = document.createElement('div');
                 selectTable.classList.add('col-12', 'pt-3');
                    const selectDiv2 = document.createElement('select');
                    selectDiv2.classList.add('form-control', 'select2-select');
                    selectDiv2.name = `relations[][column_name]`;

                    // const textOption = document.createElement('option');
                    //  textOption.value = 'text';
                    //  textOption.textContent = 'نص طويل';
                    //  selectDiv2.appendChild(textOption);
                    migrations.forEach (migration => {
                        const stringOption = document.createElement('option');
                        stringOption.value = migration;
                        stringOption.textContent = migration;
                        selectDiv2.appendChild(stringOption);
                    });

                    selectTable.appendChild(selectDiv2);
                    relationDiv.appendChild(selectTable);

                 relationsContainer.appendChild(relationDiv);

             });





         });
     </script>
     {{-- <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            الصلاحية
        </div>
        <div class="col-12 pt-3">
            <select class="form-control select2-select" name="roles[]" multiple required>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                @endforeach
            </select>
        </div>
    </div> --}}
 @endsection
