<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subtype') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-end mb-2">
                <button type="button" class="btn btn-primary align-right" id="addSubtypeBtn">Add Subtype</button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="typesData">

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
        getSubtypes();
    });

    function getSubtypes() {
        $.ajax({
            url: "{{ route('subtypes.get') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#typesData').html(response.html);
                }
            }
        })
    }

    $(document).on('click', '#addSubtypeBtn', function() {
        $.ajax({
            url: "{{ route('subtypes.create') }}",
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('subtypeModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });

    $(document).on('submit', '#addSubtypeForm', function(e){
        e.preventDefault();

        let formdata = new FormData($('#addSubtypeForm')[0]);

        $.ajax({
            url: "{{ route('subtypes.store') }}",
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status) {
                    $('#subtypeModal').modal('hide');
                    getSubtypes();
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

    $(document).on('input change', '#addSubtypeForm input, #addSubtypeForm select', function() {
        let fields = $(this).attr('name');

        $('.' + fields + '_error').text('');
        $(this).removeClass('is_invalid');
    });

    $(document).on('click', '.editBtn', function() {
        let subtype_id = $(this).data('id');

        let url = "{{ route('subtypes.edit', ':id') }}";
        url = url.replace(':id', subtype_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    $('#modalContainer').html(response.html);

                    let modalEl = document.getElementById('subtypeModal');
                    let modal = new bootstrap.Modal(modalEl);

                    modal.show();
                }
            }
        });
    });

    $(document).on('click', '.deleteBtn', function() {
        let subtype_id = $(this).data('id');

        let url = "{{ route('subtypes.destroy', ':id') }}";
        url = url.replace(':id', subtype_id);

        $.ajax({
            url: url,
            type: "GET",
            success: function(response) {
                if(response.status) {
                    alert(response.message);
                    getSubtypes();
                }
            }
        });
    });
</script>
