@extends('backend.master')

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
                            <form action="{{route('backend.categories.update',optional($category)->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Category Name</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="name" value="{{optional($category)->name}}" id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Image</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-file" name="image" type="file" id="example-url-input">
                                            <img src="{{asset('/')}}uploads/{{optional($category)->image}}" style="width: 60px;height: 60px;border-radius: 5px;" alt="{{\Illuminate\Support\Str::limit(optional($category)->slug,10)}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-md-2 col-form-label">Description</label>
                                        <div class="col-md-10">
                                            <textarea rows="4" class="form-control" name="description">
                                                {!! optional($category)->description !!}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">Select Status</label>
                                        <div class="col-md-10">
                                            <select name="status" class="form-control">
                                                <option value="1" {{optional($category)->status == 1 ? "selected" : ''}} selected>Published</option>
                                                <option value="0" {{optional($category)->status == 0 ? "selected" : ''}}>Unpublished</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label"></label>
                                        <div class="col-md-10">
                                            <button class="btn btn-primary" type="submit">Update Category</button>
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
