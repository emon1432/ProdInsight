@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Create User</h5>
                <div class="card-body">
                    <form id="validation-form" class="row g-6 ajax-validate-form" action="{{ route('users.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <h6>1. User Information</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="name">Full Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter name" required />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter email" required />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="phone">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Enter phone number" required />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="password">Role<span class="text-danger">*</span></label>
                            <select class="form-select" name="role" id="role" required>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 form-control-validation align-self-center">
                            <label class="form-label" for="image">Profile Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="Upload profile image" accept="image/*"
                                onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                        <div class="col-md-1 form-control-validation">
                            <label class="form-label" for="image_preview">Image Preview</label>
                            <div class="image-preview">
                                <img id="image_preview" src="{{ asset('uploads/default.jpg') }}" class="img-fluid rounded"
                                    alt="Image Preview" />
                            </div>
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="address">Address</label>
                            <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter address"></textarea>
                        </div>
                        <div class="col-12">
                            <h6>2. Password</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-6 form-password-toggle form-control-validation">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password" required />
                                <span class="input-group-text cursor-pointer"><i
                                        class="icon-base ti tabler-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="col-md-6 form-password-toggle form-control-validation">
                            <label class="form-label" for="password_confirmation">Confirm Password<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Confirm password" required />
                                <span class="input-group-text cursor-pointer"><i
                                        class="icon-base ti tabler-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="col-12 form-control-validation">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
