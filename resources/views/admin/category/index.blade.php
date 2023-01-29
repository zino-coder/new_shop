@extends('admin.layouts.layout')

@section('content')
    @include('admin.layouts.components.content-header', ['pageHeader' => 'Category Index'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    @include('admin.category.components.template', ['parentCategories' => $parentCategories])
                    <!-- /.card -->
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(!$categories->isEmpty())
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
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#deleteModal" data-browse="{{ route('categories.destroy', $category->id) }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No data found</p>
                            @endif
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
    @include('admin.components.modal-delete')
@endsection

@push('link-scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

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

        $('.btn-modal').click(function () {
            const href = $(this).data('browse')
            $('#deleteModal').find('form').attr('action', href);
        })
    </script>
@endpush

@push('link-styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
