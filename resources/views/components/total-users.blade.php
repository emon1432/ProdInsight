<ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
    @foreach ($users as $user)
        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $user->name }}"
            class="avatar pull-up">
            <img class="rounded-circle" src="{{ imageShow($user->image) }}" alt="{{ $user->name }}" />
        </li>
    @endforeach
    @if ($moreCount > 0)
        <li class="avatar">
            <span class="avatar-initial rounded-circle pull-up" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="{{ $moreCount }} more">+{{ $moreCount }}</span>
        </li>
    @endif
</ul>
