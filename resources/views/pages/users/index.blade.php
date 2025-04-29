@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Users</h5>
            <a class="btn add-new btn-primary" href="{{ route('users.create') }}">
                <span class="d-flex align-items-center gap-2 text-white">
                    <i class="icon-base ti tabler-plus icon-xs"></i>
                    Add New Record
                </span>
            </a>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table">
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
    </div>
@endsection
