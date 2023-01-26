@extends('admin.layouts.layout')

@section('page-name')
    Category Index
@endsection

@section('content')
    @include('admin.layouts.components.content-header', [
    'pageHeader' => 'Category Index',
    ])
    <!-- Main content -->
    <!-- Position it -->
    <div id="toast-wrapper" style="position: absolute; top: 56px; right: 0;">
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('categories.store') }}" method="POST">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="cate_name">Category Name</label>
                                    <input type="text" class="form-control" id="cate_name" name="name" placeholder="Enter Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Minimal</label>
                                    <select class="form-control select2bs4" name="parent_id" style="width: 100%;">
                                        <option value="0">Parent</option>
                                        @foreach($parentCategories as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="status" id="status">
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-outline-dark">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">Status</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Parent</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="status-btn-{{ $category->id }}" {{ $category->status ? 'checked' : '' }}>
                                                <label class="custom-control-label status-btn" for="status-btn-{{ $category->id }}"></label>
                                            </div>
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->parent->name ?? 'Parent' }}</td>
                                        <td class="text-center">
                                            <a class="d-inline-block btn btn-primary" href="{{ route('categories.edit', $category->id)}}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form class="d-inline-block btn btn-danger" action="{{ route('categories.destroy', $category->id) }}">
                                                @method('delete')
                                                <i class="fas fa-trash-alt"></i>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $categories->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('link-scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endpush

@push('custom-scripts')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        toastr.options.closeButton = true;
        toastr.options.showEasing = 'linear';
        $('.status-btn').click(function () {
            let id = $(this).attr('for').replace('status-btn-', '');
            $.ajax({
                url: "{{ route('categories.changeStatus') }}",
                method: "POST",
                data: {
                    id : id,
                    "_token": "{{ csrf_token() }}",
                    status: !$(this).siblings('input').is(':checked'),
                },
                dataType: "json",
                success:function(data){
                    console.log(data)
                    toastr.success('Change status for ' + data.name + ' successfully!', 'Update')
                }
            })
        })
    </script>
@endpush

@push('link-styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
