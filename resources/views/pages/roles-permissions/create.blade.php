@extends('layouts.app')
@section('title', __('Create New Role & Permission'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Create New Role & Permission') }}</h5>
                    @if (check_permission('roles-permissions.index'))
                        <a class="btn add-new btn-primary" href="{{ route('roles-permissions.index') }}">
                            <span class="d-flex align-items-center gap-2 text-white">
                                <i class="icon-base ti tabler-arrow-back-up icon-xs"></i>
                                {{ __('Back to Role List') }}
                            </span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <form class="row g-6 common-form" action="{{ route('roles-permissions.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <h6>{{ __('Role Information') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-8 form-control-validation">
                            <label class="form-label" for="name">{{ __('Role Name') }}<span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="{{ __('Enter Role Name') }}" required />
                        </div>
                        <div class="col-md-4 form-control-validation">
                            <label class="form-label" for="status">{{ __('Status') }}<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Active">{{ __('Active') }}</option>
                                <option value="Inactive">{{ __('Inactive') }}</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <h6>{{ __('Permissions') }}</h6>
                            <hr class="mt-0" />
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-medium">
                                                {{ __('Administrator Access') }}
                                                <i class="icon-base ti tabler-info-circle icon-xs" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="{{ __('Allows a full access to the system') }}"></i>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                        <label class="form-check-label" for="selectAll">
                                                            {{ __('Select All') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <x-permissions :routeList="$routeList" />
                        </div>
                        <div class="col-12 form-control-validation">
                            @if (check_permission('roles-permissions.create'))
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            @endif
                            @if (check_permission('roles-permissions.index'))
                                <a href="{{ route('roles-permissions.index') }}"
                                    class="btn btn-secondary">{{ __('Cancel') }}</a>
                            @endif
                            @if (check_permission('roles-permissions.create'))
                                <a href="{{ route('roles-permissions.create') }}"
                                    class="btn btn-danger">{{ __('Reset') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#selectAll').on('change', function() {
                $('.form-check-input').prop('checked', this.checked);
            });
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
