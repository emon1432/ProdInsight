@if ($type === 'page')
    @if ($action === 'create')
        @if (check_permission($resource . '.create'))
            <button type="submit" class="btn btn-primary me-2">
                <i class="icon-base ti tabler-device-floppy icon-xs me-2"></i>
                {{ __('Save') }}
            </button>
        @endif
    @elseif($action === 'edit')
        @if (check_permission($resource . '.edit'))
            <button type="submit" class="btn btn-primary me-2">
                <i class="icon-base ti tabler-device-floppy icon-xs me-2"></i>
                {{ __('Update') }}
            </button>
        @endif
    @endif
    @if (check_permission($resource . '.index'))
        <button type="button" class="btn btn-secondary me-2"
            onclick="window.location.href='{{ route($resource . '.index') }}'">
            <i class="icon-base ti tabler-x icon-xs me-2"></i>
            {{ __('Cancel') }}
        </button>
    @endif
    @if (check_permission($resource . '.create'))
        <button type="button" class="btn btn-danger" onclick="window.location.reload();">
            <i class="icon-base ti tabler-refresh icon-xs me-2"></i>
            {{ __('Reset') }}
        </button>
    @endif
@elseif($type === 'modal')
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        <i class="icon-base ti tabler-x icon-xs me-2"></i>
        {{ __('Close') }}
    </button>
    @if ($action === 'create')
        @if (check_permission($resource . '.create'))
            <button type="submit" class="btn btn-primary">
                <i class="icon-base ti tabler-device-floppy icon-xs me-2"></i>
                {{ __('Save') }}
            </button>
        @endif
    @elseif($action === 'edit')
        @if (check_permission($resource . '.edit'))
            <button type="submit" class="btn btn-primary">
                <i class="icon-base ti tabler-device-floppy icon-xs me-2"></i>
                {{ __('Update') }}
            </button>
        @endif
    @endif
@endif
