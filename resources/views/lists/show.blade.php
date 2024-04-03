@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><h6>Detail User ID # {{ $user->id }}</h6></td>
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
                                        <a href="{{ route('lists.edit', $user->id) }}" class="btn btn-info text-capitalize">Edit</a>
                                        <form action="{{ route('lists.destroy', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-capitalize" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                        </form>
                                        <a href="javascript:history.back()" class="btn btn-secondary text-capitalize">Back</a>
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
</main>
@endsection
