<!-- Modal -->
<div class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="addTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTypeModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addTypeForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type_id" value="{{ old('type_id', $type->id ?? '')}}">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Type Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $type->name ?? '') }}" id="name" aria-describedby="nameHelp">
                <span class="name_error text-danger error-text"></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Type Image</label>
                <input type="file" name="image" class="form-control" id="image">
                @if (!@empty($type->image))
                    <img src="{{ asset('uploads/'. $type->image) }}" alt="type image" width="100px">
                @endif
                <span class="image_error text-danger error-text"></span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
