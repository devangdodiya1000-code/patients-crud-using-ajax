<div class="modal fade" id="subtypeModal" tabindex="-1" aria-labelledby="subtypeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="subtypeModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="addSubtypeForm" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <input type="hidden" name="subtype_id" value="{{ old('subtype_id', $subtype->id ?? '')}}">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Subtype Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $subtype->name ?? '') }}" id="name" aria-describedby="nameHelp">
                    <span class="name_error text-danger error-text"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Types</label>
                    <select class="form-select" id="type_id" name="type_id" aria-label="Default select example">
                        <option value="">Select Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $subtype->type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <span class="type_id_error text-danger error-text"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleInputImage" class="form-label">Subtype Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @if (!@empty($subtype->image))
                        <img src="{{ asset('uploads/'. $subtype->image) }}" alt="subtype image" width="100px">
                    @endif
                    <span class="image_error text-danger error-text"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>
