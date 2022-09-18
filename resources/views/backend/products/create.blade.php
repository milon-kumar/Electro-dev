@extends('backend.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Form Elements</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Elements</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <form action="{{route('backend.products.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Select Category</label>
                                        <div class="col-md-10">
                                            <select class="js-example-basic-single form-control" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Select Brand</label>
                                        <div class="col-md-10">
                                            <select class="js-example-basic-single form-control" name="brand_id">
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Product Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="name" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Product Price</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" name="price" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">Stock Status :</label>
                                        <div class="col-md-10">
                                            <div class="custom-control custom-radio custom-radio-success mb-3 custom-control-inline">
                                                <input type="radio" id="inStock" name="stock_status" value="in-stock" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="inStock">In Stock</label>
                                            </div>

                                            <div class="custom-control custom-radio custom-radio-danger mb- custom-control-inline">
                                                <input type="radio" value="out-of-stock" id="outOfStock" name="stock_status" class="custom-control-input">
                                                <label class="custom-control-label" for="outOfStock">Out Of Stock</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Short Description</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control"name="short_description" id="" cols="30" rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Size</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" name="size">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Color</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" value="" name="color">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Quantity</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" value="" name="quantity">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Image</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-file" name="image" type="file" id="example-url-input">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea rows="4" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Details</label>
                                        <div class="col-md-10">
                                            <textarea rows="4" class="form-control" name="details"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2">Product Feature :</label>
                                        <div class="col-md-10">
                                            <div class="custom-control custom-radio custom-radio-success mb-3 custom-control-inline">
                                                <input type="radio" id="new" name="product_feature" value="new" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="new"><span class="badge badge-success">New</span></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-danger mb-3 custom-control-inline">
                                                <input type="radio" id="sell" name="product_feature" value="sell" class="custom-control-input">
                                                <label class="custom-control-label" for="sell"><span class="badge badge-danger">Sell</span></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-warning mb-3 custom-control-inline">
                                                <input type="radio" id="hot" name="product_feature" value="hot" class="custom-control-input">
                                                <label class="custom-control-label" for="hot"><span class="badge badge-warning">Hot</span></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-radio-info mb-3 custom-control-inline">
                                                <input type="radio" id="top" name="product_feature" value="top" class="custom-control-input" >
                                                <label class="custom-control-label" for="top"><span class="badge badge-info">Top</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Discount</label>
                                        <div class="col-md-10">
                                            <input type="number" class="form-control" name="discount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Select Status</label>
                                        <div class="col-md-10">
                                            <select name="status" class="form-control">
                                                <option value="1" selected>Published</option>
                                                <option value="0">Unpublished</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label"></label>
                                        <div class="col-md-10">
                                            <button class="btn btn-primary" type="submit">Save Brand</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
@endsection
@push('js')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
