<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo ">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <img src="{{ imageShow(settings('business_settings', 'logo')) }}"
                        alt="{{ settings('business_settings', 'company_name') }}" class="logo"
                        style="max-height: 30px; max-width: 100%;">
                </span>
            </span>
            <span
                class="app-brand-text demo menu-text fw-bold ms-3">{{ settings('business_settings', 'company_name') }}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-header small">
            <span class="menu-header-text">{{ __('Home') }}</span>
        </li>
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div>{{ __('Dashboard') }}</div>
            </a>
        </li>
        <li class="menu-header small">
            <span class="menu-header-text">{{ __('Inventory') }}</span>
        </li>
        @if (main_menu_permission('raw-material-categories') ||
                main_menu_permission('raw-materials') ||
                main_menu_permission('non-inventory-items') ||
                main_menu_permission('categories'))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-category"></i>
                    <div>{{ __('Item Management') }}</div>
                </a>
                <ul class="menu-sub">
                    @if (check_permission('raw-material-categories.index'))
                        <li class="menu-item">
                            <a href="{{ route('raw-material-categories.index') }}" class="menu-link">
                                <div>{{ __('Raw Material Categories') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('raw-materials.index'))
                        <li class="menu-item">
                            <a href="{{ route('raw-materials.index') }}" class="menu-link">
                                <div>{{ __('Raw Materials') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('non-inventory-items.index'))
                        <li class="menu-item">
                            <a href="{{ route('non-inventory-items.index') }}" class="menu-link">
                                <div>{{ __('Non Inventory Items') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('categories.index'))
                        <li class="menu-item">
                            <a href="{{ route('categories.index') }}" class="menu-link">
                                <div>{{ __('Categories') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        <li class="menu-header small">
            <span class="menu-header-text">{{ __('System') }}</span>
        </li>
        @if (main_menu_permission('users') || main_menu_permission('roles-permissions'))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-users"></i>
                    <div>{{ __('User Management') }}</div>
                </a>
                <ul class="menu-sub">
                    @if (check_permission('users.index'))
                        <li class="menu-item">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <div>{{ __('User List') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('roles-permissions.index'))
                        <li class="menu-item">
                            <a href="{{ route('roles-permissions.index') }}" class="menu-link">
                                <div>{{ __('Roles & Permissions') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (main_menu_permission('units') ||
                main_menu_permission('currencies') ||
                main_menu_permission('taxes') ||
                main_menu_permission('production-stages'))
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon icon-base ti tabler-archive"></i>
                    <div>{{ __('Accessories') }}</div>
                </a>
                <ul class="menu-sub">
                    @if (check_permission('units.index'))
                        <li class="menu-item">
                            <a href="{{ route('units.index') }}" class="menu-link">
                                <div>{{ __('Units') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('currencies.index'))
                        <li class="menu-item">
                            <a href="{{ route('currencies.index') }}" class="menu-link">
                                <div>{{ __('Currencies') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('taxes.index'))
                        <li class="menu-item">
                            <a href="{{ route('taxes.index') }}" class="menu-link">
                                <div>{{ __('Taxes') }}</div>
                            </a>
                        </li>
                    @endif
                    @if (check_permission('production-stages.index'))
                        <li class="menu-item">
                            <a href="{{ route('production-stages.index') }}" class="menu-link">
                                <div>{{ __('Production Stages') }}</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if (check_permission('settings.index'))
            <li class="menu-item">
                <a href="{{ route('settings.index') }}" class="menu-link">
                    <i class="menu-icon icon-base ti tabler-settings"></i>
                    <div>{{ __('Settings') }}</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>
