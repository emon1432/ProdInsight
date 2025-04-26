<script>
    @foreach (session('toasts', collect())->toArray() as $toast)
        var options = {
            title: '{{ $toast['title'] }}',
            message: '{{ $toast['message'] }}',
            messageColor: '{{ $toast['messageColor'] }}',
            messageSize: '{{ $toast['messageSize'] }}',
            titleLineHeight: '{{ $toast['titleLineHeight'] }}',
            messageLineHeight: '{{ $toast['messageLineHeight'] }}',
            position: '{{ $toast['position'] }}',
            titleSize: '{{ $toast['titleSize'] }}',
            titleColor: '{{ $toast['titleColor'] }}',
            closeOnClick: '{{ $toast['closeOnClick'] }}',

        };

        var type = '{{ $toast['type'] }}';

        show(type, options);
    @endforeach
    function show(type, options) {
        if (type === 'info') {
            iziToast.info(options);
        } else if (type === 'success') {
            iziToast.success(options);
        } else if (type === 'warning') {
            iziToast.warning(options);
        } else if (type === 'error') {
            iziToast.error(options);
        } else {
            iziToast.show(options);
        }

    }

    {{ session()->forget('toasts') }}

    $(document).ready(function() {
        const currentPath = window.location.pathname;
        $('.menu-inner .menu-link').each(function() {
            const link = $(this);
            const href = link.attr('href');

            if (!href || href === 'javascript:void(0);') return;

            const linkPath = new URL(href, window.location.origin).pathname;

            // Exact match or wildcard match
            const isExactMatch = currentPath === linkPath;
            const isWildcardMatch = currentPath.startsWith(linkPath + '/');

            if (isExactMatch || isWildcardMatch) {
                const menuItem = link.closest('.menu-item');
                menuItem.addClass('active');

                // Add 'active open' to all parent .menu-item
                link.parents('.menu-sub').each(function() {
                    $(this).closest('.menu-item').addClass('active open');
                });
            }
        });
    });
</script>
