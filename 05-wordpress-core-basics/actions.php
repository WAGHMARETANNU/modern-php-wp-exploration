<?php
/**
 * Simulating WordPress Actions using pure PHP
 * understand how add_action works internally
 */

// ---------------------------------------------
// STEP 1: Global storage for actions
// ---------------------------------------------

$actions = [];

/**
 * Register a function to an action
 */
function add_action($hook_name, $callback) {
    global $actions;

    // Store callback under the hook name
    $actions[$hook_name][] = $callback;
}

/**
 * Execute all callbacks attached to an action
 */
function do_action($hook_name) {
    global $actions;

    if (!empty($actions[$hook_name])) {
        foreach ($actions[$hook_name] as $callback) {
            call_user_func($callback);
        }
    }
}
// ---------------------------------------------
// STEP 2: Registering actions
// ---------------------------------------------

function load_plugin() {
    echo "Plugin loaded\n";
}

function load_theme() {
    echo "Theme loaded\n";
}

function site_ready() {
    echo "Site is ready\n";
}

// Attach functions to actions
add_action('plugins_loaded', 'load_plugin');
add_action('theme_loaded', 'load_theme');
add_action('init', 'site_ready');
// ---------------------------------------------
// STEP 3: WordPress core firing actions
// ---------------------------------------------

echo "---- WordPress Loading ----\n";

do_action('plugins_loaded');
do_action('theme_loaded');
do_action('init');
