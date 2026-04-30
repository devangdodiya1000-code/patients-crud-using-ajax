<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="patientModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form id="patientForm">
            @csrf
            <div class="modal-body">
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="e.g. narender">
                    <span class="text-danger error-text full_name_error"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="45">
                    <span class="text-danger error-text age_error"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                    <option selected disabled>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    </select>
                    <span class="text-danger error-text gender_error"></span>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="3232323232">
                    <span class="text-danger error-text contact_number_error"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type_id" name="type_id">
                    <option value="">Select Type</option>
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                    </select>
                    <span class="text-danger error-text type_id_error"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="subtype" class="form-label">Subtype</label>
                    <select class="form-select" id="subtype_id" name="subtype_id">
                    <option value="">Select Subtype</option>
                    @foreach ($subtypes as $subtype)
                    <option value="{{ $subtype->id }}">{{ $subtype->name }}</option>
                    @endforeach
                    </select>
                    <span class="text-danger error-text subtype_id_error"></span>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department" name="department" placeholder="dalara">
                    <span class="text-danger error-text department_error"></span>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="doctor" class="form-label">Doctor Assigned</label>
                    <input type="text" class="form-control" id="doctor_assigned" name="doctor_assigned" placeholder="mahesh">
                    <span class="text-danger error-text doctor_assigned_error"></span>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="roomNumber" class="form-label">Room Number</label>
                    <input type="text" class="form-control" id="roomNumber" name="room_number" placeholder="3">
                    <span class="text-danger error-text room_number_error"></span>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    </select>
                    <span class="text-danger error-text status_error"></span>
                </div>

                <div class="col-md-8 mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" class="form-control" id="amount" name="bill_amount" placeholder="3440.00">
                    <span class="text-danger error-text bill_amount_error"></span>
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="admitDate" class="form-label">Admit Date</label>
                    <input type="datetime-local" class="form-control" id="admitDate" name="admission_date">
                    <span class="text-danger error-text admission_date_error"></span>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dischargeDate" class="form-label">Discharge Date</label>
                    <input type="datetime-local" class="form-control" id="dischargeDate" name="discharge_date">
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
