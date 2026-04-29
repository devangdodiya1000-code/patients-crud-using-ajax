@if ($types->count() > 0)
    @foreach ($types as $type)
    <tr>
        <td >
            <img src="{{ asset('uploads/'.$type->image) }}" width="100px" alt="Type image">
        </td>
        <td >{{ $type->name }}</td>
        <td >{{ $type->status }}</td>
        <td >
            <a href="#" class="btn btn-warning editBtn" data-id="{{ $type->id }}">Edit</a>
            <a href="#" class="btn btn-danger btnDelete" data-id="{{ $type->id }}">Delete</a>
        </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="4" class="text-center">No Data Found</td>
    </tr>
@endif
