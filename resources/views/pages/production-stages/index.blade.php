@extends('layouts.app')
@section('title', __('Production Stages'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Production Stages') }}</h5>
            @if (check_permission('production-stages.create'))
                <a class="btn add-new btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#add-production-stages-modal">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                        {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('production-stages.index') }}"
                data-columns='[
                { "data": "itemInfo" },
                { "data": "description" },
                { "data": "status" },
                { "data": "createdBy" },
                @if (main_menu_permission('production-stages')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created By') }}</th>
                        @if (main_menu_permission('production-stages'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @if (check_permission('production-stages.create'))
        @include('pages.production-stages.create')
    @endif
    @if (check_permission('production-stages.edit'))
        @include('pages.production-stages.edit')
    @endif
@endsection
@push('scripts')
    <script>
        $('.common-datatable').on('click', '.edit-production-stages-modal', function() {
            var model = $(this).data('model');
            var modal = $('#edit-production-stages-modal');

            modal.find('#name').val(model.name);
            modal.find('#code').val(model.code);
            modal.find('#description').val(model.description);
            modal.find('#status').val(model.status).trigger('change');
            modal.find('form').attr('action', "{{ url('production-stages') }}/" + model.id);
            modal.modal('show');
        });
    </script>
@endpush
