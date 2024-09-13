        @extends('layouts.admin')

        @section('content')
           <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 " >
            <form class="row" enctype="multipart/form-data" action="{{ route('partner.update.web', $partner->id) }}" method="POST">
                @csrf
                     <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle"></span> التعديل
                        </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="form-group">
    <label for="image">Image</label>
    <div class="col-12 p-2">
        <div class="col-12">Image</div>
        <div class="col-12 pt-3">
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="col-12 pt-3"></div>
    </div>
</div>

                <div class="col-12 p-3">
                <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
        @endsection