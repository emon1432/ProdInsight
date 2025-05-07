<div class="d-flex justify-content-start align-items-center user-name">
    <div class="avatar-wrapper">
        <div class="avatar avatar-sm me-4">
            <span class="avatar-initial rounded-circle bg-label-success">{{ $initials }}</span>
        </div>
    </div>
    <div class="d-flex flex-column">
        <a href="{{ route('users.show', $user->id) }}" class="text-heading text-truncate">
            <span class="fw-medium">{{ $user->name }}</span>
        </a>
        <small>{{ $user->email }}</small>
    </div>
</div>
