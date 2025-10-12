@extends('layouts.app')
@section('title', __('Taxes'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Taxes') }}</h5>
            @if (check_permission('taxes.create'))
                <a class="btn add-new btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#add-taxes-modal">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                        {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('taxes.index') }}"
                data-columns='[
                { "data": "display_name" },
                { "data": "calculation_method_type" },
                { "data": "rate_display" },
                { "data": "scope" },
                { "data": "description" },
                { "data": "status" },
                { "data": "createdBy" },
                @if (main_menu_permission('taxes')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Calculation Method & Type') }}</th>
                        <th>{{ __('Rate') }}</th>
                        <th>{{ __('Scope') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created By') }}</th>
                        @if (main_menu_permission('taxes'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @if (check_permission('taxes.create'))
        @include('pages.taxes.create')
    @endif
    @if (check_permission('taxes.edit'))
        @include('pages.taxes.edit')
    @endif
@endsection
@push('scripts')
    <script>
        $('.common-datatable').on('click', '.edit-taxes-modal', function() {
            var model = $(this).data('model');
            var modal = $('#edit-taxes-modal');

            modal.find('#name').val(model.name);
            modal.find('#calculation_method').val(model.calculation_method).trigger('change');
            modal.find('#rate').val(model.rate);
            modal.find('#type').val(model.type).trigger('change');
            modal.find('#scope').val(model.scope).trigger('change');
            modal.find('#description').val(model.description);
            modal.find('#status').val(model.status).trigger('change');
            modal.find('form').attr('action', "{{ url('taxes') }}/" + model.id);
            modal.modal('show');
        });
    </script>
@endpush
