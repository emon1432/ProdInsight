@extends('layouts.app')
@section('title', __('Non Inventory Items'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Non Inventory Items') }}</h5>
            @if (check_permission('non-inventory-items.create'))
                <a class="btn add-new btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                    data-bs-target="#add-non-inventory-items-modal">
                    <span class="d-flex align-items-center gap-2 text-white">
                        <i class="icon-base ti tabler-plus icon-xs"></i>
                        {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('non-inventory-items.index') }}"
                data-columns='[
                { "data": "itemInfo" },
                { "data": "description" },
                { "data": "status" },
                { "data": "createdBy" },
                @if (main_menu_permission('non-inventory-items')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created By') }}</th>
                        @if (main_menu_permission('non-inventory-items'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @if (check_permission('non-inventory-items.create'))
        @include('pages.non-inventory-items.create')
    @endif
    @if (check_permission('non-inventory-items.edit'))
        @include('pages.non-inventory-items.edit')
    @endif
@endsection
@push('scripts')
    <script>
        $('.common-datatable').on('click', '.edit-non-inventory-items-modal', function() {
            var model = $(this).data('model');
            var modal = $('#edit-non-inventory-items-modal');
            console.log(model, modal);


            modal.find('#name').val(model.name);
            modal.find('#code').val(model.code);
            modal.find('#description').val(model.description);
            modal.find('#status').val(model.status).trigger('change');
            modal.find('form').attr('action', "{{ url('non-inventory-items') }}/" + model.id);
            modal.modal('show');
        });
    </script>
@endpush
