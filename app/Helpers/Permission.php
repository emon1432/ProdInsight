<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

function get_route_list($roleGroup = null)
{
    $routes = Route::getRoutes()->getRoutes();
    $groupedRoutes = [];

    foreach ($routes as $route) {
        $middlewares = $route->gatherMiddleware();

        // find role group from middleware
        $currentGroup = null;
        foreach ($middlewares as $m) {
            if (str_starts_with($m, 'permission:')) {
                $currentGroup = substr($m, strlen('permission:'));
                break;
            }
        }

        if (!$currentGroup) continue; // skip routes without permission middleware

        // if a specific role group is passed, skip others
        if ($roleGroup && $currentGroup !== $roleGroup) continue;

        $routeName = $route->getName();
        if (!$routeName) continue;

        $parts = explode('.', $routeName);
        if (count($parts) < 2) continue;

        $group = $parts[0];
        $action = $parts[1];

        if ($action === 'store') $action = 'create';
        if ($action === 'update') $action = 'edit';

        $groupedRoutes[$currentGroup][$group][$action] = false;
    }

    // If specific role group requested, return only that group’s routes
    return $roleGroup ? ($groupedRoutes[$roleGroup] ?? []) : $groupedRoutes;
}

function get_readable_action_name($action)
{
    $map = [
        'index' => __('List'),
        'show' => __('Details'),
        'create' => __('Add'),
        'store' => __('Add'),
        'edit' => __('Edit'),
        'update' => __('Edit'),
        'destroy' => __('Delete'),
        'delete' => __('Delete'),
        'download' => __('Download'),
        'upload' => __('Upload'),
        'approve' => __('Approve'),
        'reject' => __('Reject'),
        'restore' => __('Restore'),
    ];

    return $map[$action] ?? __(ucfirst(str_replace(['-', '_'], ' ', $action)));
}

function check_permission($routeName)
{
    $user = Auth::user();

    if ($user->role->id == 1) return true;

    $parts = explode('.', $routeName);
    $group = $parts[0] ?? '';
    $action = $parts[1] ?? '';

    if ($action === 'store') $action = 'create';
    if ($action === 'update') $action = 'edit';

    $rolePermissions = $user->role->permission ?? [];
    $groupPermissions = get_route_list()[$user->roleGroup->slug] ?? [];

    return ($rolePermissions[$group][$action] ?? false) || ($groupPermissions[$group][$action] ?? false);
}

function main_menu_permission($menuName)
{
    $user = Auth::user();

    if ($user->role->id == 1) return true;

    $rolePermissions = $user->role->permission[$menuName] ?? [];
    
    return in_array(true, $rolePermissions, true);
}
