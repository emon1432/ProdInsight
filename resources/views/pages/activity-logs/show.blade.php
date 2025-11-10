@extends('layouts.app')
@section('title', __('Activity Log Details'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ __('Activity Log Details') }}</h5>
                    @if (check_permission('activity-logs.index'))
                        <a class="btn add-new btn-primary" href="{{ route('activity-logs.index') }}">
                            <span class="d-flex align-items-center gap-2 text-white">
                                <i class="icon-base ti tabler-arrow-back-up icon-xs"></i>
                                {{ __('Back to Activity Logs') }}
                            </span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="border rounded p-3 bg-light-subtle">
                                <h6 class="fw-semibold mb-3 text-muted">{{ __('User Info') }}</h6>
                                <p class="mb-1"><strong>{{ __('User:') }}</strong>
                                    {{ $activityLog->user ? $activityLog->user->name : $activityLog->user_name ?? __('System') }}
                                    ({{ $activityLog->role ? $activityLog->role->name . ' of ' . $activityLog->role->roleGroup->name : $activityLog->role_name ?? __('No role assigned') }})
                                </p>
                                <p class="mb-1"><strong>{{ __('IP Address:') }}</strong>
                                    {{ $activityLog->ip_address ?? '-' }}</p>
                                <p class="mb-0"><strong>{{ __('User Agent:') }}</strong>
                                    {{ $activityLog->user_agent }}</p>
                                <p class="mb-0"><strong>{{ __('Platform & Source:') }}</strong>
                                    {{ $activityLog->platform ?? '-' }} / {{ $activityLog->source ?? '-' }}</p>
                                <p class="mb-0"><strong>{{ __('URL:') }}</strong>
                                    {{ $activityLog->url ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border rounded p-3 bg-light-subtle">
                                <h6 class="fw-semibold mb-3 text-muted">{{ __('Event Info') }}</h6>
                                <p class="mb-1"><strong>{{ __('Event:') }}</strong>
                                    {{ ucfirst($activityLog->event) }}
                                </p>
                                <p class="mb-1"><strong>{{ __('Model:') }}</strong>
                                    {{ class_basename($activityLog->model_type) }}</p>
                                <p class="mb-1"><strong>{{ __('Record ID:') }}</strong> {{ $activityLog->model_id }}</p>
                                <p class="mb-1"><strong>{{ __('Model Name:') }}</strong>
                                    {{ $activityLog->model_name ?? '-' }}</p>
                                <p class="mb-0"><strong>{{ __('Created At:') }}</strong>
                                    {{ $activityLog->created_at->format('Y-m-d H:i:s') }}
                                    ({{ $activityLog->created_at->diffForHumans() }})</p>
                                <p class="mb-0"><strong>{{ __('Description:') }}</strong>
                                    {{ $activityLog->description ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="border rounded p-3">
                        <h6 class="fw-semibold mb-3 text-muted">
                            <i class="icon-base ti tabler-arrows-diff me-1"></i>
                            {{ __('Changes (Old vs New Values)') }}
                        </h6>

                        <table class="table table-sm table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 25%">{{ __('Field') }}</th>
                                    <th style="width: 37.5%" class="text-danger">
                                        <i class="icon-base ti tabler-x me-1"></i>
                                        {{ __('Old Value') }}
                                    </th>
                                    <th style="width: 37.5%" class="text-success">
                                        <i class="icon-base ti tabler-check me-1"></i>
                                        {{ __('New Value') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $oldValues = $activityLog->properties['old'] ?? [];
                                    $newValues = $activityLog->properties['new'] ?? [];
                                    $allKeys = collect(
                                        array_merge(array_keys($oldValues), array_keys($newValues)),
                                    )->unique();
                                @endphp

                                @forelse ($allKeys as $key)
                                    @php
                                        $oldFormatted = resolve_related_value($key, $oldValues[$key] ?? '-');
                                        $newFormatted = resolve_related_value($key, $newValues[$key] ?? '-');
                                    @endphp
                                    <tr>
                                        <td class="fw-semibold">{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                        <td class="text-muted">{!! $oldFormatted !!}</td>
                                        <td class="text-muted">{!! $newFormatted !!}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">{{ __('No changes recorded') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
