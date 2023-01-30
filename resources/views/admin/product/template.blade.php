@extends('admin.layouts.layout')

@section('content')
    @include('admin.layouts.components.content-header', ['pageHeader' => 'Product Create'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="post" enctype="multipart/form-data">
                        <div class="card card-dark card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                    <li class="pt-2 px-3"><h3 class="card-title">Add New Product</h3></li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-general-tab" data-toggle="pill" href="#product-general" role="tab" aria-controls="product-general" aria-selected="true">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-content-tab" data-toggle="pill" href="#product-content" role="tab" aria-controls="product-content" aria-selected="false">Content</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-attribute-tab" data-toggle="pill" href="#product-attribute" role="tab" aria-controls="product-attribute" aria-selected="false">Attribute</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade show active" id="product-general" role="tabpanel" aria-labelledby="product-general-tab">
                                        @if(isset($product))
                                            @method('put')
                                        @endif
                                        @csrf
                                        <div class="form-group">
                                            <label for="product-name">Product Name:</label>
                                            <input type="text" name="name" class="form-control" id="product-name" value="{{ $product->name ?? '' }}" placeholder="Insert Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Category:</label>
                                            <select class="form-control select2bs4" name="category_id" style="width: 100%;">
                                                @if(!$categories->isEmpty())
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}"{{ isset($product) && $product->category_id == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                                                        @if(isset($category->children))
                                                            @foreach($category->children as $child)
                                                                <option value="{{ $child->id }}"{{ isset($product) && $product->category_id == $child->id ? ' selected' : '' }}>{{ '- ' . $child->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Brand:</label>
                                            <select class="form-control select2bs4" style="width: 100%;">
                                                <option selected="selected">Alabama</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product-amount">Amount:</label>
                                            <input type="number" name="amount" class="form-control" id="product-amount" placeholder="Insert Product Amount" value="{{ $product->amount ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="product-price">Regular Price:</label>
                                            <input type="number" name="regular_price" class="form-control" id="product-price" value="{{ $product->regular_price ?? '' }}" placeholder="Insert Product Regular Price">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="is_sale" class="custom-control-input" id="is_sale">
                                                <label class="custom-control-label" for="is_sale">On Sale?</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <select class="btn btn-outline-secondary" id="sale_select" disabled>
                                                        <option value="percent">Percent</option>
                                                        <option value="value">Sale Price</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control" id="sale_value" disabled>
                                                <!-- /btn-group -->
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" id="is_featured" name="is_featured" {{ isset($product) && $product->is_featured == 1 ? 'checked' : '' }}>
                                                <label for="is_featured" class="text-success">
                                                    Is featured?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-danger d-inline">
                                                <input type="checkbox" id="is_hot" name="is_hot" {{ isset($product) && $product->is_hot == 1 ? 'checked' : '' }}>
                                                <label for="is_hot" class="text-danger">
                                                    Is hot?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <div class="icheck-info d-inline">
                                                <input type="checkbox" id="status" name="status" {{ isset($product) && $product->status == 1 ? 'checked' : '' }}>
                                                <label for="status" class="text-info">
                                                    Status
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="customFile">Featured Image:</label>
                                            <div class="custom-file">
                                                <input type="file" name="featured_image" class="custom-file-input" id="featured_image">
                                                <label class="custom-file-label" for="featured_image">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="document">Thumb</label>
                                            <div class="needsclick dropzone" id="document-dropzone">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product-content" role="tabpanel" aria-labelledby="product-content-tab">
                                        <div class="form-group">
                                            <label for="product-description">Description:</label>
                                            <textarea class="tiny-editor" id="product_description" name="description" rows="3">
                                                {!! $product->description ?? '' !!}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Content:</label>
                                            <textarea class="tiny-editor" id="content" name="content" rows="3">
                                                {!! $product->content ?? '' !!}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="product-attribute" role="tabpanel" aria-labelledby="product-attribute-tab">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.card -->
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('custom-scripts')
    <script type="text/javascript">
        $(function () {
            bsCustomFileInput.init();
        });
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $('#is_sale').change(function () {
            if ($(this).is(':checked')) {
                $('#sale_value').prop('disabled', false);
                $('#sale_select').prop('disabled', false);
            } else {
                $('#sale_select').prop('disabled', true);
                $('#sale_value').prop('disabled', true);
            }
        })
        tinymce.init({
            selector: '.tiny-editor',
            plugins: 'save image link media lists preview quickbars',
            toolbar: 'save | undo redo | styles | bold italic underline | link quickimage media | numlist bullist',
            resize: true,
            a11y_advanced_options: true,
            quickbars_insert_toolbar: true,
        });
    //     DropzoneJS
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.upload') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            maxFiles: 5,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
                {{--$.ajax({--}}
                {{--    type: "POST",--}}
                {{--    url: "{{ route('dropzoneUnlink') }}",--}}
                {{--    data: {--}}
                {{--        name: name,--}}
                {{--        _token: '{{ csrf_token() }}'--}}
                {{--    },--}}
                {{--    dataType: "json",--}}
                {{--    encode: true,--}}
                {{--}).done(function (data) {--}}
                {{--    console.log(data);--}}
                {{--});--}}
            },
            init: function () {
                @if(isset($product) && $product->thumbImages)
                var files =
                    {!! json_encode($product->thumbImages) !!}
                    for (let i in files) {
                    let file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $(file.previewElement).find('.dz-image').find('img').attr('src', '{{ Storage::disk('local')->url('public/uploads/thumb/') }}' + file.name)
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif

                this.on("maxfilesexceeded", function(file){
                    alert("No more files please!");
                    this.removeFile(file);
                });
            }
        }
    </script>
@endpush
