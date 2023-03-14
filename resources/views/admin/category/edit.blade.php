@extends('admin.layouts.layout')

@section('content')
    @include('admin.layouts.components.content-header', ['pageHeader' => 'Category Edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.category.components.template', ['method' => 'update', 'parentCategories' => $parentCategories, 'category' => $category])
                </div>
            </div>
        </div>
    </div>
@endsection
