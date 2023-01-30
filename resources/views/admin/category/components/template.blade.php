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
            <div class="form-group">
                <label for="document">Documents</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
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

@push('custom-scripts')
<script>
  var uploadedDocumentMap = {}
  Dropzone.options.documentDropzone = {
    url: '{{ route('dropzone') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
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
      $.ajax({
      type: "POST",
      url: "{{ route('dropzoneUnlink') }}",
      data: {
        name: name,
        _token: '{{ csrf_token() }}'
      },
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
    });
    },
    init: function () {
      @if(isset($project) && $project->document)
        var files =
          {!! json_encode($project->document) !!}
        for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
      @endif
    }
  }
</script>
@endpush()

@push('link-styles')
<link
  rel="stylesheet"
  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
  type="text/css"
/>
@endpush()

@push('link-scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush()