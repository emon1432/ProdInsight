@extends('layouts.app')
@section('title', __('Currencies'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Currencies') }}</h5>
            @if (check_permission('currencies.create'))
                <a class="btn add-new btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#add-currencies-modal">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                        {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('currencies.index') }}"
                data-columns='[
                { "data": "name" },
                { "data": "code" },
                { "data": "symbol" },
                { "data": "conversion_rate" },
                { "data": "status" },
                { "data": "createdBy" },
                @if (main_menu_permission('currencies')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Code') }}</th>
                        <th>{{ __('Symbol') }}</th>
                        <th>{{ __('Conversion Rate') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created By') }}</th>
                        @if (main_menu_permission('currencies'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @if (check_permission('currencies.create'))
        @include('pages.currencies.create')
    @endif
    @if (check_permission('currencies.edit'))
        @include('pages.currencies.edit')
    @endif
@endsection
@push('scripts')
    <script>
        $('.common-datatable').on('click', '.edit-currencies-modal', function() {
            var model = $(this).data('model');
            var modal = $('#edit-currencies-modal');

            modal.find('#name').val(model.name);
            modal.find('#code').val(model.code);
            modal.find('#symbol').val(model.symbol);
            modal.find('#conversion_rate').val(model.conversion_rate);
            modal.find('#position').val(model.position).trigger('change');
            modal.find('#status').val(model.status).trigger('change');
            modal.find('form').attr('action', "{{ url('currencies') }}/" + model.id);
            modal.modal('show');
        });
    </script>
@endpush
