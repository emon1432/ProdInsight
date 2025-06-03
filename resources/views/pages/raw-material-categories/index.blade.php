@extends('layouts.app')
@section('title', __('Raw Material Categories'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Raw Material Categories') }}</h5>
            @if (check_permission('raw-material-categories.create'))
                <a class="btn add-new btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#add-raw-material-categories-modal">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                        {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('raw-material-categories.index') }}"
                data-columns='[
                { "data": "name" },
                { "data": "description" },
                { "data": "status" },
                { "data": "createdBy" },
                @if (main_menu_permission('raw-material-categories')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created By') }}</th>
                        @if (main_menu_permission('raw-material-categories'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @if (check_permission('raw-material-categories.create'))
        @include('pages.raw-material-categories.create')
    @endif
    @if (check_permission('raw-material-categories.edit'))
        @include('pages.raw-material-categories.edit')
    @endif
@endsection
@push('scripts')
    <script>
        $('.common-datatable').on('click', '.edit-raw-material-categories-modal', function() {
            var model = $(this).data('model');
            var modal = $('#edit-raw-material-categories-modal');

            modal.find('#name').val(model.name);
            modal.find('#description').val(model.description);
            modal.find('#status').val(model.status).trigger('change');
            modal.find('form').attr('action', "{{ url('raw-material-categories') }}/" + model.id);
            modal.modal('show');
        });
    </script>
@endpush
