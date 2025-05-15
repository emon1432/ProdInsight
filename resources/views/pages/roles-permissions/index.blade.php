@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Roles & Permissions') }}</h5>
            <a class="btn add-new btn-primary" href="{{ route('roles-permissions.create') }}">
                <span class="d-flex align-items-center gap-2 text-white">
                    <i class="icon-base ti tabler-plus icon-xs"></i>
                    {{ __('Add New Record') }}
                </span>
            </a>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('roles-permissions.index') }}"
                data-columns='[
                { "data": "name" },
                { "data": "total_users" },
                { "data": "actions"}
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Total Users') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
