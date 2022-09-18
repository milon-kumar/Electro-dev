@extends('backend.master')
@push('css')
    <!-- DataTables -->
{{--    <link href="{{asset('/')}}assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('/')}}assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <!-- Responsive datatable examples -->--}}
{{--    <link href="{{asset('/')}}assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />--}}




{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Data Tables</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Data Tables</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('backend.categories.create')}}" class="btn btn-success rounded-0">Add Category</a>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key => $category)
                                            <tr>
                                                <td>{{$key +1}}</td>
                                                <td>{{optional($category)->name}}</td>
                                                <td>
                                                    <img src="{{asset('/')}}uploads/{{optional($category)->image}}" style="width: 40px;height: 40px;border-radius: 5px;" alt="">
                                                </td>
                                                <td>{{\Illuminate\Support\Str::limit(optional($category)->description,25)}}</td>
                                                <td>
                                                    @if(optional($category)->status == 1)
                                                        <span class="badge badge-success rounded-0">Published</span>
                                                    @else
                                                        <span class="badge badge-danger rounded-0">Unpublished</span>
                                                    @endif
                                                </td>
                                                <td>{{optional($category)->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{route('backend.categories.edit',$category->id)}}" class="btn btn-success btn-sm rounded-0 shadow">Edit</a>
                                                    <a href="{{route('backend.categories.destroy',$category->id)}}" onclick="event.preventDefault();document.getElementById('deleteForm{{$category->id}}').submit();" class="btn btn-danger btn-sm rounded-0 shadow">Delete</a>
                                                    <form id="deleteForm{{$category->id}}" action="{{route('backend.categories.destroy',$category->id)}}" class="d-none" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

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
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                buttons: [
                    'copy', 'excel', 'pdf'
                ]
            });
        });
    </script>


@endpush
