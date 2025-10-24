@extends('layouts.app')
@section('title', __('Brands'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Brands') }}</h5>
            <div class="card-header-elements d-flex gap-2">
                @if (check_permission('brands.create'))
                    <a class="btn add-new btn-primary" href="{{ route('brands.create') }}">
                        <span class="d-flex align-items-center gap-2 text-white">
                            <i class="icon-base ti tabler-plus icon-xs"></i>
                            {{ __('Add New Record') }}
                        </span>
                    </a>
                @endif
            </div>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('brands.index') }}"
                data-columns='[
                { "data": "itemInfo" },
                { "data": "status" },
                @if (main_menu_permission('brands')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Status') }}</th>
                        @if (main_menu_permission('brands'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
