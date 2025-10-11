@extends('layouts.app')
@section('title', __('Categories'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Categories') }}</h5>
            <div class="card-header-elements d-flex gap-2">
                @if (check_permission('categories.index'))
                    <a class="btn btn-info" href="{{ route('categories.index', ['view' => 'tree']) }}">
                        <span class="d-flex align-items-center gap-2 text-white">
                            <i class="icon-base ti tabler-sitemap icon-xs"></i>
                            {{ __('Categories Tree View') }}
                        </span>
                    </a>
                @endif
                @if (check_permission('categories.create'))
                    <a class="btn add-new btn-primary" href="{{ route('categories.create') }}">
                        <span class="d-flex align-items-center gap-2 text-white">
                            <i class="icon-base ti tabler-plus icon-xs"></i>
                            {{ __('Add New Record') }}
                        </span>
                    </a>
                @endif
            </div>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('categories.index') }}"
                data-columns='[
                { "data": "itemInfo" },
                { "data": "parentCategory" },
                { "data": "status" },
                @if (main_menu_permission('categories')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Parent Category') }}</th>
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
