@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Users</h5>
            <button class="btn add-new btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasAddUser">
                <span>
                    <span class="d-flex align-items-center gap-2">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                            Add New Record
                    </span>
                </span>
            </button>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table">
                <thead class="border-top">
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Plan</th>
                        <th>Billing</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-4">
                                        <span class="avatar-initial rounded-circle bg-label-success">JD</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="app-user-view-account.html" class="text-heading text-truncate">
                                        <span class="fw-medium">John Doe</span>
                                    </a>
                                    <small>john.doe@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-truncate d-flex align-items-center text-heading">
                                <i class="icon-base ti tabler-crown icon-md text-primary me-2"></i>Admin
                            </span>
                        </td>
                        <td><span class="text-heading">Enterprise</span></td>
                        <td>$120/month</td>
                        <td><span class="badge bg-label-success text-capitalized">Active</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="javascript:;"
                                    class="btn btn-text-secondary rounded-pill waves-effect btn-icon delete-record">
                                    <i class="icon-base ti tabler-trash icon-22px"></i>
                                </a>
                                <a href="app-user-view-account.html"
                                    class="btn btn-text-secondary rounded-pill waves-effect btn-icon">
                                    <i class="icon-base ti tabler-eye icon-22px"></i>
                                </a>
                                <a href="javascript:;"
                                    class="btn btn-text-secondary rounded-pill waves-effect btn-icon dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="javascript:;" class="dropdown-item">Edit</a>
                                    <a href="javascript:;" class="dropdown-item">Suspend</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar-sm me-4">
                                        <span class="avatar-initial rounded-circle bg-label-info">AS</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="app-user-view-account.html" class="text-heading text-truncate">
                                        <span class="fw-medium">Alice Smith</span>
                                    </a>
                                    <small>alice.smith@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-truncate d-flex align-items-center text-heading">
                                <i class="icon-base ti tabler-edit icon-md text-warning me-2"></i>Editor
                            </span>
                        </td>
                        <td><span class="text-heading">Basic</span></td>
                        <td>$50/month</td>
                        <td><span class="badge bg-label-warning text-capitalized">Pending</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="javascript:;"
                                    class="btn btn-text-secondary rounded-pill waves-effect btn-icon delete-record">
                                    <i class="icon-base ti tabler-trash icon-22px"></i>
                                </a>
                                <a href="app-user-view-account.html"
                                    class="btn btn-text-secondary rounded-pill waves-effect btn-icon">
                                    <i class="icon-base ti tabler-eye icon-22px"></i>
                                </a>
                                <a href="javascript:;"
                                    class="btn btn-text-secondary rounded-pill waves-effect btn-icon dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="javascript:;" class="dropdown-item">Edit</a>
                                    <a href="javascript:;" class="dropdown-item">Suspend</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>

        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header border-bottom">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 p-6 h-100">
                <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
                    <div class="mb-6 form-control-validation">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe"
                            name="userFullname" aria-label="John Doe" />
                    </div>
                    <div class="mb-6 form-control-validation">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com" name="userEmail" />
                    </div>
                    {{-- add more fields as needed --}}
                    <button type="submit" class="btn btn-primary me-3 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
