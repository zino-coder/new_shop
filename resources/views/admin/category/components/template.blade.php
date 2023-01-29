@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('success') }}
    </div>
@endif
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($method) ? 'Edit Category' : 'Add New Category' }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ isset($method) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
        <div class="card-body">
            @csrf
            @if(isset($method))
                @method('put')
            @endif
            <div class="form-group">
                <label for="cate_name">Category Name</label>
                <input type="text" class="form-control" id="cate_name" name="name" value="{{ isset($category) ? $category->name : '' }}" placeholder="Enter Category Name">
            </div>
            <div class="form-group">
                <label>Minimal</label>
                <select class="form-control select2bs4" name="parent_id" style="width: 100%;">
                    <option value="0">Parent</option>
                    @foreach($parentCategories as $parent)
                        @if(isset($category) && $parent->id == $category->parent_id)
                            <option value="{{ $parent->id }}" selected>{{ $parent->name }}</option>
                        @else
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- /.form-group -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="status" {{ isset($category) ? 'checked' : '' }} id="status">
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ isset($method) ? 'Update' : 'Create' }}</button>
            <button type="reset" class="btn btn-outline-dark">Reset</button>
        </div>
    </form>
</div>
