<div class="d-flex align-items-center">
    <a href="javascript:;" class="btn btn-text-secondary rounded-pill waves-effect btn-icon dropdown-toggle hide-arrow"
        data-bs-toggle="dropdown">
        <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end m-0">
        @isset($actions['buttons']['custom'])
            @php
                $customButtons = $actions['buttons']['custom'];
            @endphp
            @foreach ($customButtons as $button => $details)
                <a href="{{ $details['route'] }}" class="dropdown-item d-flex align-items-center">
                    <i class="icon-base ti tabler-{{ $details['icon'] }} me-2"></i>
                    {{ $button }}
                </a>
            @endforeach
        @endisset
        @isset($actions['buttons']['basic'])
            @php
                $buttons = $actions['buttons']['basic'];
                $resource = $actions['resource'];
                $model = $actions['model'];
            @endphp
            @if ($buttons['view'])
                <a href="{{ route($resource . '.show', $model->id) }}" class="dropdown-item d-flex align-items-center">
                    <i class="icon-base ti tabler-eye me-2"></i>
                    {{ __('View') }}
                </a>
            @endif
            @if ($buttons['edit'])
                <a href="{{ route($resource . '.edit', $model->id) }}" class="dropdown-item d-flex align-items-center">
                    <i class="icon-base ti tabler-edit me-2"></i>
                    {{ __('Edit') }}
                </a>
            @endif
            @if ($buttons['delete'])
                <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center delete-record">
                    <i class="icon-base ti tabler-trash me-2"></i>
                    <form action="{{ route($resource . '.destroy', $model->id) }}" method="DELETE" class="d-none">
                        @csrf
                    </form>
                    {{ __('Delete') }}
                </a>
            @endif
        @endisset
    </div>
</div>
