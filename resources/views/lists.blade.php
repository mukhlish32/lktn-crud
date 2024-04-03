@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="d-inline-block">User Lists</h6>
                            <a href="{{ route('lists.create') }}" class="btn btn-info ms-2 text-capitalize">
                                <i class="fas fa-plus"></i>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 display" id="data-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            E-Mail</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created At
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('style')
<link href="{{ asset('assets/plugins/datatables/dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.js') }}"></script>
<script>
    $(document).ready(function() {
        var datatable = $('#data-table').DataTable({
            pageLength: 10,
            responsive: true,
            serverSide: true,
            scrollX: true,
            searchDelay: 1000,
            searching: false,
            ajax: "{{ route('lists.index') }}",
            columns: [
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { 
                    data: 'created_at', 
                    name: 'created_at',
                    render: function(data, type, row) {
                        return moment(data).format('DD MMMM YYYY HH:mm:ss');
                    }
                },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            searching: true,
            paging: true,
            pagingType: 'simple_numbers',
            // Add any additional options or configurations here
        });
    });
</script>
@endpush