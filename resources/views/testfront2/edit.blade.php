        @extends('layouts.admin')

        @section('content')
        <div class="col-12 p-3">
            <form action="{{ route('testfront2.update', $testfront2->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Name
        </div>
        <div class="col-12 pt-3">
            <input type="text" name="Name" id="Name" class="form-control" value="{{ $testfront2->Name }}">
        </div>
    </div>
<div class="col-12 col-lg-6 p-2">
    <div class="col-12">
        Nummer
    </div>
    <div class="col-12 pt-3">
        <input type="number" name="Nummer" id="Nummer" class="form-control" value="{{ $testfront2->Nummer }}">
    </div>
</div>
    <div class="col-12  p-2" >
        <div class="col-12">
            Discripe
        </div>
        <div class="col-12 pt-3">
            <textarea name="discripe" id="discripe" class="editor with-file-explorer">{{ $testfront2->discripe }}</textarea>
        </div>
    </div>
<div class="form-group">
    <label for="image">Image</label>
    <div class="col-12 p-2">
        <div class="col-12">Image</div>
        <div class="col-12 pt-3">
            <input type="file" name="image_file" class="form-control" accept="image/*">
        </div>
        <div class="col-12 pt-3"></div>
    </div>
</div>
<div class="col-12 col-lg-6 p-2">
        <div class="col-12">
            Date
        </div>
        <div class="col-12 pt-3">
             <input type="datetime-local" name="date" id="date" class="form-control" value="{{ $testfront2->date }}">
        </div>
</div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        @endsection