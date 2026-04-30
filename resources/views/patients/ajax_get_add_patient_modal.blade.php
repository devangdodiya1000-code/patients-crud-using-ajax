<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="patientModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="patientForm">
            @csrf
            <input type="hidden" name="patient_id" value="{{ old('patient_id', $patient->id ?? '')}}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $patient->full_name ?? '')}}" placeholder="e.g. narender">
                        <span class="text-danger error-text full_name_error"></span>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $patient->age ?? '')}}" placeholder="45">
                        <span class="text-danger error-text age_error"></span>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option selected disabled>Choose...</option>
                            <option value="male" {{ old('gender', $patient->gender ?? null) == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $patient->gender ?? null) == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', $patient->gender ?? null) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <span class="text-danger error-text gender_error"></span>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" name="contact_number" value="{{ old('contact_number', $patient->contact_number ?? null) }}" id="contact_number" placeholder="3232323232">
                    <span class="text-danger error-text contact_number_error"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type_id" name="type_id">
                    <option value="">Select Type</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id', $patient->type_id ?? null) == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                    @endforeach
                    </select>
                    <span class="text-danger error-text type_id_error"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="subtype" class="form-label">Subtype</label>
                    <select class="form-select" id="subtype_id" name="subtype_id">
                    <option value="">Select Subtype</option>
                    @foreach ($subtypes as $subtype)
                    <option value="{{ $subtype->id }}" {{ old('subtype_id', $patient->subtype_id ?? null) == $subtype->id ? 'selected' : ''}}>{{ $subtype->name }}</option>
                    @endforeach
                    </select>
                    <span class="text-danger error-text subtype_id_error"></span>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" value="{{ old('department', $patient->department ?? null) }}" name="department" placeholder="dalara">
                    <span class="text-danger error-text department_error"></span>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="doctor" class="form-label">Doctor Assigned</label>
                    <input type="text" class="form-control" id="doctor_assigned" value="{{ old('department', $patient->doctor_assigned ?? null) }}" name="doctor_assigned" placeholder="mahesh">
                    <span class="text-danger error-text doctor_assigned_error"></span>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="roomNumber" class="form-label">Room Number</label>
                    <input type="text" class="form-control" id="roomNumber" value="{{ old('department', $patient->room_number ?? null) }}" name="room_number" placeholder="3">
                    <span class="text-danger error-text room_number_error"></span>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                    <option value="1" {{ old('status', $patient->status ?? null) == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{ old('status', $patient->status ?? null) == 0 ? 'selected' : ''}}>Inactive</option>
                    </select>
                    <span class="text-danger error-text status_error"></span>
                </div>

                <div class="col-md-8 mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="amount" value="{{ old('bill_amount', $patient->bill_amount ?? null) }}" name="bill_amount" placeholder="3440.00">
                    <span class="text-danger error-text bill_amount_error"></span>
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="admitDate" class="form-label">Admit Date</label>
                    <input type="datetime-local" class="form-control" id="admitDate" value="{{ old('admission_date', $patient->admission_date ?? null)}}" name="admission_date">
                    <span class="text-danger error-text admission_date_error"></span>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dischargeDate" class="form-label">Discharge Date</label>
                    <input type="datetime-local" class="form-control" id="dischargeDate" value="{{ old('admission_date', $patient->discharge_date ?? null)}}" name="discharge_date">
                    <span class="text-danger error-text discharge_date_error"></span>
                </div>
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
