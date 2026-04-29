@if ($subtypes->count() > 0)
    @foreach ($subtypes as $subtype)
    <tr>
        <td>
            <img src="{{ asset('uploads/'.$subtype->image) }}" width="100px" alt="Subtype image">
        </td>
        <td>{{ $subtype->type->name }}</td>
        <td>{{ $subtype->name }}</td>
        <td>
            @if ($subtype->status == 1)
                <span class="btn btn-success">Active</span>
            @else
                <span class="btn btn-danger">Inactive</span>
            @endif
        </td>
        <td>
            <a href="#" class="btn btn-warning editBtn" data-id="{{ $subtype->id }}">Edit</a>
            <a href="#" class="btn btn-danger deleteBtn" data-id="{{ $subtype->id }}">Delete</a>
        </td>
    </tr>
    @endforeach
@else
<tr>
    <td colspan="5" class="text-center">No data found</td>
</tr>
@endif
