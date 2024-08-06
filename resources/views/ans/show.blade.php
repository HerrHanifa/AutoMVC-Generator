@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
            <div class="form-group">
            <label for="string">String</label>
            <p>{{ $item->string }}</p>
        </div>
        <div class="form-group">
            <label for="stringe">Stringe</label>
            <p>{{ $item->stringe }}</p>
        </div>

</div>
@endsection