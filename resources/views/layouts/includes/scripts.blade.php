<script>
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
