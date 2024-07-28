@extends('layouts.admin')
@section('content')

<style>
    .new-message {
    display: inline-block;
    min-width: 20px;
    padding: 0 6px;
    color: #fff;
    background-color: #f00;
    border-radius: 10px;
    text-align: center;
    line-height: 20px;
    font-size: 12px;
}
td {
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal;
}
table {
    table-layout: fixed;
}





</style>
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">

		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-articles"></span> الرسائل الواردة
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
						<th>اسم المستخدم</th>
						<th>رقم هاتفه</th>
						<th>بريده الالكتروني</th>
						<th>الرسالة</th>
                        <th style="width:100px;">تحكم</th>

					</tr>
				</thead>
				<tbody>
					@foreach($messages as $message)
					<tr>
                        @if ($message->seen==0)
                        <td><span class="new-message">جديد</span></td>
                    @else
                        <td></td>
                    @endif



						<td>{{$message->name}}</td>
						<td>{{$message->phoneNumber}}</td>
                        <td>{{$message->email}}</td>
                        <td class="message-column">{{ $message->message }}</td>

						<td style="width: 200px;">






                                <a href="{{route('admin.messages.show',['message'=>$message->id])}}">
								<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
									<span class="fas fa-search "></span> عرض
								</span>
							</a>




							<form method="POST" action="{{route('admin.messages.destroy',$message->id)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>

						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
			</div>
		</div>

	</div>
</div>
@endsection
