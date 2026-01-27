<?php
/**
 * Simulating WordPress Filters using pure PHP
 * Filters MODIFY data and RETURN it
 */

// ---------------------------------------------
// STEP 1: Global filter storage
// ---------------------------------------------

$filters = [];

/**
 * Register a filter callback
 */
function add_filter($hook_name, $callback) {
    global $filters;

    $filters[$hook_name][] = $callback;
}

/**
 * Apply all filters to a value
 */
function apply_filters($hook_name, $value) {
    global $filters;

    if (!empty($filters[$hook_name])) {
        foreach ($filters[$hook_name] as $callback) {
            // IMPORTANT: each filter modifies the value
            $value = call_user_func($callback, $value);
        }
    }

    return $value;
}
// ---------------------------------------------
// STEP 2: Registering filters
// ---------------------------------------------

function add_prefix($text) {
    return "[PREFIX] " . $text;
}

function make_uppercase($text) {
    return strtoupper($text);
}

// Attach filters
add_filter('the_content', 'add_prefix');
add_filter('the_content', 'make_uppercase');
// ---------------------------------------------
// STEP 3: WordPress applying filters
// ---------------------------------------------

$content = "Learning WordPress filters";

echo "Before filters:\n";
echo $content . "\n\n";

$filtered_content = apply_filters('the_content', $content);

echo "After filters:\n";
echo $filtered_content . "\n";
