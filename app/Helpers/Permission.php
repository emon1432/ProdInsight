<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

function get_route_list()
{
    //get only 'permission' middleware routes
    $routes = Route::getRoutes()->getRoutes();
    $routes = array_filter($routes, function ($route) {
        return in_array('permission', $route->gatherMiddleware());
    });

    //
    $routeList = [];
    foreach ($routes as $route) {
        $routeName = explode('.', $route->getName());
        if (isset($routeName[1])) {
            $routeList[$routeName[0]][] = $routeName[1];
        }
    }
    //remove duplicate routes
    foreach ($routeList as $key => $value) {
        $routeList[$key] = array_unique($value);
    }
    // return response()->json($routeList);

    //remove unnecessary routes
    unset($routeList['login']);
    unset($routeList['logout']);
    unset($routeList['register']);
    unset($routeList['password']);
    unset($routeList['verification']);
    unset($routeList['password']);
    unset($routeList['user-profile-information']);
    unset($routeList['user-password']);
    unset($routeList['two-factor']);
    unset($routeList['profile']);
    unset($routeList['sanctum']);
    unset($routeList['livewire']);
    unset($routeList['ignition']);

    //sort ascending
    ksort($routeList);


    //set all routes to false
    foreach ($routeList as $key => $value) {
        $routeList[$key] = array_fill_keys($value, false);
    }

    return $routeList;
}

function check_permission($routeName)
{
    if (Auth::user()->role->id == 1)
        return true;

    $routeName = explode('.', $routeName);
    if (count($routeName) < 2) {
        if ($routeName[0] == 'dashboard')
            return true;
        else
            return false;
    }
    $authUserPermissions = Auth::user()->role->permission;
    $authUserPermissions = json_decode($authUserPermissions, true);
    if (isset($authUserPermissions[$routeName[0]][$routeName[1]])) {
        if ($authUserPermissions[$routeName[0]][$routeName[1]] == true) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function main_menu_permission($menuName)
{
    if (Auth::user()->role->id == 1)
        return true;

    $authUserPermissions = Auth::user()->role->permission;
    $authUserPermissions = json_decode($authUserPermissions, true);
    if (isset($authUserPermissions[$menuName])) {
        foreach ($authUserPermissions[$menuName] as $key => $value) {
            if ($value == true) {
                return true;
            }
        }
        return false;
    } else {
        return false;
    }
}
