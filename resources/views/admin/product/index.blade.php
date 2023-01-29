@extends('admin.layouts.layout')

@section('content')
    @include('admin.layouts.components.content-header', ['pageHeader' => 'Product Index'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-12">
                                @if(!$products->isEmpty())
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">Status</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Amount</th>
                                            <th>Price</th>
                                            <th>Featured</th>
                                            <th>Hot</th>
                                            <th>View</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="text-center">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="status-btn-{{ $product->id }}" {{ $product->status ? 'checked' : '' }}>
                                                        <label class="custom-control-label status-btn" for="status-btn-{{ $product->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->slug }}</td>
                                                <td>{{ $product->category->name ?? null }}</td>
                                                <td>{{ $product->brand_id }}</td>
                                                <td>{{ number_format($product->amount) }}</td>
                                                <td>{{ number_format($product->regular_price) }}</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="check-featured" {{ $product->is_featured == 1 ? 'checked=""' : '' }}>
                                                        <label for="check-featured" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" id="check-hot" {{ $product->is_hot == 1 ? 'checked=""' : '' }}>
                                                        <label for="check-hot" class="custom-control-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $product->view_count }}</td>
                                                <td class="text-center">
                                                    <a class="d-inline-block btn btn-primary" href="{{ route('categories.edit', $product->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#deleteModal" data-browse="{{ route('categories.destroy', $product->id) }}">
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
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">

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
