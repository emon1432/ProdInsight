<div class="d-flex align-items-center">
    @if (!empty($actions['buttons']))
        <a href="javascript:;"
            class="btn btn-text-secondary rounded-pill waves-effect btn-icon dropdown-toggle hide-arrow"
            data-bs-toggle="dropdown">
            <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end m-0">
            @isset($actions['buttons']['custom'])
                @php
                    $customButtons = $actions['buttons']['custom'];
                @endphp
                @foreach ($customButtons as $button => $details)
                    @if (check_permission($details['route']))
                        <a href="{{ $details['route'] }}" class="dropdown-item d-flex align-items-center">
                            <i class="icon-base ti tabler-{{ $details['icon'] }} me-2"></i>
                            {{ $button }}
                        </a>
                    @endif
                @endforeach
            @endisset
            @isset($actions['buttons']['basic'])
                @php
                    $buttons = $actions['buttons']['basic'];
                    $resource = $actions['resource'];
                    $model = $actions['model'];
                @endphp
                @if ($buttons['view'] && check_permission($resource . '.show'))
                    @if (isset($buttons['view']['modal']) && $buttons['view']['modal'])
                        @php
                            $url = 'javascript:void(0);';
                        @endphp
                    @else
                        @php
                            $url = route($resource . '.show', $model->id);
                        @endphp
                    @endif
                    <a href="{{ $url }}"
                        class="dropdown-item d-flex align-items-center {{ isset($buttons['view']['modal']) && $buttons['view']['modal'] ? 'view-' . $resource . '-modal' : '' }}"
                        @if (isset($buttons['view']['modal']) && $buttons['view']['modal']) data-model="{{ $model }}" @endif>
                        <i class="icon-base ti tabler-eye me-2"></i>
                        {{ __('View') }}
                    </a>
                @endif
                @if ($buttons['edit'] && check_permission($resource . '.edit'))
                    @if (isset($buttons['edit']['modal']) && $buttons['edit']['modal'])
                        @php
                            $url = 'javascript:void(0);';
                        @endphp
                    @else
                        @php
                            $url = route($resource . '.edit', $model->id);
                        @endphp
                    @endif
                    <a href="{{ $url }}"
                        class="dropdown-item d-flex align-items-center {{ isset($buttons['edit']['modal']) && $buttons['edit']['modal'] ? 'edit-' . $resource . '-modal' : '' }}"
                        @if (isset($buttons['edit']['modal']) && $buttons['edit']['modal']) data-model="{{ $model }}" @endif>
                        <i class="icon-base ti tabler-edit me-2"></i>
                        {{ __('Edit') }}
                    </a>
                @endif
                @if ($buttons['delete'] && check_permission($resource . '.destroy'))
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
    @endif
</div>
