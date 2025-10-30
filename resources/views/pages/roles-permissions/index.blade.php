@extends('layouts.app')
@section('title', __('Roles & Permissions'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Roles & Permissions') }}</h5>
            @if (check_permission('roles-permissions.create'))
                <a class="btn add-new btn-primary" href="{{ route('roles-permissions.create') }}">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                        {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('roles-permissions.index') }}"
                data-columns='[
                { "data": "group" },
                { "data": "name" },
                { "data": "total_users" },
                 @if (check_permission('roles-permissions.show')) { "data": "permission_view" }, @endif
                { "data": "status" },
                 @if (main_menu_permission('roles-permissions')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Group') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Total Users') }}</th>
                        @if (check_permission('roles-permissions.show'))
                            <th>{{ __('Permissions') }}</th>
                        @endif
                        <th>{{ __('Status') }}</th>
                        @if (main_menu_permission('roles-permissions'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
