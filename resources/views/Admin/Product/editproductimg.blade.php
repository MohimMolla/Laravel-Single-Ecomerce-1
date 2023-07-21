@extends('layouts.dashboard')
@section('page-tittle')
    Edit Product Image
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Edit Product Image</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>Edit Product Image</h4>
                    <small class="text-muted float-end">Input Information</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updateproductimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$p_img->id}}" name="id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Image</label>
                            <div class="col-sm-10">
																													<img src="{{ asset('productimage/' . $p_img->product_image) }}" height="100px" alt="">
                            </div>
                        </div>
																								
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image Upload</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="product_image" name="product_image" />
                            </div>
                        </div>



                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
