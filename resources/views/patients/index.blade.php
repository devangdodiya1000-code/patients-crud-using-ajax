<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="text-end mb-2">
                <button type="button" class="btn btn-primary align-right" id="addTextBtn">Add Patients</button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Type</th>
                                <th scope="col">Subtype</th>
                                <th scope="col">Department</th>
                                <th scope="col">Doctor assigned</th>
                                <th scope="col">Room Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Admite Date</th>
                                <th scope="col">Discharge Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="patientsData">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="modalContainer"></div>
</x-app-layout>
<script>
    $(document).ready(function() {
        getPatients();
    });

    function getPatients() {
        $.ajax({
            url: "{{ route('patients.get') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#patientsData').html(response.html);
                }
            }
        });
    }

    $(document).on('click', '#addTextBtn', function() {
        $.ajax({
            url: "{{ route('patients.create') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('patientModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });

    $(document).on('submit', '#patientForm', function(e) {
        e.preventDefault();

        let formData = new FormData($('#patientForm')[0]);

        $.ajax({
            url: "{{ route('patients.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status) {
                    $('#patientModal').modal('hide');
                    getPatients();
                }
            },
            error: function(error) {
                let errors = error.responseJSON.errors;

                $.each(errors, function(key, value) {
                    $('.' + key + '_error').text(value[0]);
                });
            }
        });
    });

    $(document).on('input change', '#patientForm input, #patientForm select, #patientForm date', function() {
        let fields = $(this).attr('name');

        $('.' + fields + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.editBtn', function() {
        let patient_id = $(this).data('id');

        let url = "{{ route('patients.edit', ':id') }}";
        url = url.replace(':id', patient_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('patientModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    })
</script>
