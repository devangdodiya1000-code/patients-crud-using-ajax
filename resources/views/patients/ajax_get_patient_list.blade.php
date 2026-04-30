@if ($patients->count() > 0)
    @foreach ($patients as $patient)
        <tr>
            <td>{{ $patient->full_name }}</td>
            <td>{{ $patient->age }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->contact_number }}</td>
            <td>{{ $patient->type->name }}</td>
            <td>{{ $patient->subtype->name }}</td>
            <td>{{ $patient->department }}</td>
            <td>{{ $patient->doctor_assigned }}</td>
            <td>{{ $patient->room_number }}</td>
            <td>
                @if ($patient->status == 1)
                    <span class="btn btn-success">Active</span>
                @else
                    <span class="btn btn-danger">Inactive</span>
                @endif
            </td>
            <td>{{ $patient->bill_amount }}</td>
            <td>{{ $patient->admission_date }}</td>
            <td>{{ $patient->discharge_date }}</td>
            <td>
                <a href="#" class="btn btn-warning">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="13" class="text-center py-4">
            <div class="text-muted">No patient records found in the system.</div>
        </td>
    </tr>
@endif
