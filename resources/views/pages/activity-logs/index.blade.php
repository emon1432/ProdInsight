@extends('layouts.app')
@section('title', __('Activity Logs'))
@section('content')
    <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ __('Activity Logs') }}</h5>
        </div>
        <div class="card-datatable">
            <table class="common-datatable table d-table" data-url="{{ route('activity-logs.index') }}"
                data-columns='[
                { "data": "userInfo" },
                { "data": "event" },
                { "data": "model" },
                { "data": "description" },
                { "data": "ip" },
                { "data": "time" },
                @if (main_menu_permission('activity-logs')) { "data": "actions" } @endif
                ]'>
                <thead class="border-top">
                    <tr>
                        <th>{{ __('User') }}</th>
                        <th>{{ __('Event') }}</th>
                        <th>{{ __('Model') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('IP') }}</th>
                        <th>{{ __('Time') }}</th>
                        @if (main_menu_permission('activity-logs'))
                            <th>{{ __('Actions') }}</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
