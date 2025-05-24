<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

function get_route_list()
{
    $routes = Route::getRoutes()->getRoutes();
    $routes = array_filter($routes, function ($route) {
        return in_array('permission', $route->gatherMiddleware());
    });

    $routeList = [];
    foreach ($routes as $route) {
        $routeName = explode('.', $route->getName());
        if (isset($routeName[1])) {
            $group = $routeName[0];
            $action = $routeName[1];
            if ($action === 'store') {
                $action = 'create';
            } elseif ($action === 'update') {
                $action = 'edit';
            }
            $routeList[$group][] = $action;
        }
    }
    foreach ($routeList as $key => $actions) {
        $routeList[$key] = array_unique($actions);
    }
    $excluded = [
        'login',
        'logout',
        'register',
        'password',
        'verification',
        'user-profile-information',
        'user-password',
        'two-factor',
        'profile',
        'sanctum',
        'livewire',
        'ignition'
    ];
    foreach ($excluded as $exclude) {
        unset($routeList[$exclude]);
    }
    ksort($routeList);
    foreach ($routeList as $key => $actions) {
        $routeList[$key] = array_fill_keys($actions, false);
    }

    return $routeList;
}

function get_readable_action_name($action)
{
    $map = [
        'index' => 'List',
        'show' => 'Details',
        'create' => 'Add',
        'store' => 'Add',
        'edit' => 'Edit',
        'update' => 'Edit',
        'destroy' => 'Delete',
        'delete' => 'Delete',
        'download' => 'Download',
        'upload' => 'Upload',
        'approve' => 'Approve',
        'reject' => 'Reject',
        'restore' => 'Restore',
    ];

    return $map[$action] ?? ucfirst(str_replace(['-', '_'], ' ', $action));
}

function check_permission($routeName)
{
    if (Auth::user()->role->id == 1)
        return true;

    $routeName = explode('.', $routeName);
    if (count($routeName) < 2) {
        return $routeName[0] === 'dashboard';
    }

    $group = $routeName[0];
    $action = $routeName[1];

    // Normalize action names just like in get_route_list()
    if ($action === 'store') {
        $action = 'create';
    } elseif ($action === 'update') {
        $action = 'edit';
    }

    $authUserPermissions = Auth::user()->role->permission;

    return isset($authUserPermissions[$group][$action]) && $authUserPermissions[$group][$action] === true;
}


function main_menu_permission($menuName)
{
    if (Auth::user()->role->id == 1) {
        return true;
    }

    $permissions = Auth::user()->role->permission;

    if (!isset($permissions[$menuName])) {
        return false;
    }

    return in_array(true, $permissions[$menuName], true);
}
