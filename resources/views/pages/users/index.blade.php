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
            <table class="common-datatable table d-table" data-url="{{ route('users.index') }}"
                data-columns='[
                { "data": "name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "actions"}
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
