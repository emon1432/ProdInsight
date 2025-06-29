@extends('layouts.app')
@section('title', __('Raw Materials'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Raw Materials') }}</h5>
            @if (check_permission('raw-materials.create'))
                <a class="btn add-new btn-primary" href="{{ route('raw-materials.create') }}" <span
                    class="d-flex align-items-center gap-2 text-white">
                    <i class="icon-base ti tabler-plus icon-xs"></i>
                    {{ __('Add New Record') }}
                    </span>
                </a>
            @endif
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('raw-materials.index') }}"
                data-columns='[
                { "data": "itemInfo" },
                { "data": "category" },
                { "data": "purchasePricePerUnit" },
                { "data": "conversion_rate"},
                { "data": "consumptionPricePerUnit"},
                { "data": "stock"},
                { "data": "status" },
                @if (main_menu_permission('raw-materials')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Purchase Price') }}</th>
                        <th>{{ __('Conversion Rate') }}</th>
                        <th>{{ __('Consumption Price') }}</th>
                        <th>{{ __('Current Stock') }}</th>
                        <th>{{ __('Status') }}</th>
                        @if (main_menu_permission('raw-material'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
