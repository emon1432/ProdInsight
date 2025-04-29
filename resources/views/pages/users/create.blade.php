@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">FormValidation</h5>
                <div class="card-body">
                    <form id="validation-form" class="row g-6 ajax-validate-form" action="{{ route('users.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <h6>1. Account Details</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter name" required />
                        </div>
                        <div class="col-md-6 form-control-validation">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter email" required />
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
