@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <h6>Detail User ID # {{ $user->id }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">Name</label></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">Email</label></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">Phone</label></td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">Address</label></td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">Created At</label></td>
                                <td>{{ $user->created_at->format('d F Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td><label class="col-form-label">Updated At</label></td>
                                <td>{{ $user->updated_at ? $user->updated_at->format('d F Y H:i:s') : '-' }}</td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <a href="{{ route('lists.edit', $user->id) }}"
                                        class="btn btn-info text-capitalize">Edit</a>
                                    <form id="form-delete" action="{{ route('lists.destroy', $user->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" id="btn-delete"
                                            class="btn btn-danger text-capitalize">Delete</button>
                                    </form>
                                    <a href="javascript:history.back()"
                                        class="btn btn-secondary text-capitalize">Back</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.getElementById('btn-delete');
        const deleteForm = document.getElementById('form-delete');

        deleteButton.addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    });
</script>
@endpush