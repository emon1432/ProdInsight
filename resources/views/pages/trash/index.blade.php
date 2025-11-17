@extends('layouts.app')
@section('title', __('Trash'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Trash') }}</h5>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('trash.index') }}"
                data-columns='[
                { "data": "info" },
                { "data": "model" },
                { "data": "deleted_by" },
                { "data": "deleted_at" },
                @if (main_menu_permission('trash')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('Info') }}</th>
                        <th>{{ __('Item Type') }}</th>
                        <th>{{ __('Deleted By') }}</th>
                        <th>{{ __('Deleted At') }}</th>
                        @if (main_menu_permission('trash'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
