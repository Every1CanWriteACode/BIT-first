<?php

namespace BIT\app;

use BIT\app\App;

class AdminRoute {

    public static function start(App $app) {
        add_action('admin_menu', function() {
            $routes = require 'C:\xampp\htdocs\wordpress\wp-content\plugins\BIT-first\routes/adminRoute.php';
            foreach ($routes as $path => $route) {
                list($controller, $method) = explode('@', $route, 2);
                $controller = 'BIT\\controllers\\' . $controller;
                add_menu_page(ucfirst($path) . ' Title', ucfirst($path) . ' Menu'/* . $app->routeDir*/, 'manage_options', $path, (new $controller)->$method());
            }
        });
    }
}

// add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null );
// add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null );