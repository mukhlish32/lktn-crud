@extends('layouts.app')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h6>Create User</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lists.store') }}" method="POST">
                            @csrf

                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td><label for="name" class="col-form-label">Name</label></td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name') }}" required
                                                pattern="[A-Za-z]+" title="Alphabet only">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="col-form-label">Email</label></td>
                                        <td>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{ old('email') }}" required unique
                                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="phone" class="col-form-label">Phone</label></td>
                                        <td>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" value="{{ old('phone') }}"
                                                pattern="[A-Za-z0-9]+" title="Alpha-numeric">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="address" class="col-form-label">Address</label></td>
                                        <td>
                                            <textarea class="form-control @error('address') is-invalid @enderror"
                                                id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary text-capitalize">
                                                Submit
                                            </button>
                                            <a href="javascript:history.back()" class="btn btn-secondary text-capitalize">Cancel</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection