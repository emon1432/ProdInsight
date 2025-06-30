<div class="d-flex justify-content-start align-items-center item-info">
    <div class="avatar-wrapper">
        <div class="avatar avatar-sm me-4">
            @if (!empty($image) && file_exists(public_path($image)))
                <img src="{{ $image }}" alt="{{ $name }}" class="rounded-circle">
            @elseif (!empty($initials))
                @php
                    $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
                @endphp
                <span class="avatar-initial rounded-circle bg-label-{{ $colors[array_rand($colors)] }}">
                    {{ $initials }}
                </span>
            @endif
        </div>
    </div>
    <div class="d-flex flex-column">
        <span class="fw-medium text-heading text-truncate">{{ $name }}</span>
        @if (!empty($code) && !empty($barcode))
            <small>{{ $code }} ({{ $barcode }})</small>
        @elseif(!empty($code))
            <small>{{ $code }}</small>
        @elseif(!empty($barcode))
            <small>{{ $barcode }}</small>
        @endif
    </div>
</div>
