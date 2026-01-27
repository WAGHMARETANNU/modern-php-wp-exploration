<?php
/**
 * Simulating WordPress Theme Rendering
 *
 * WordPress decides which template to load
 * based on the request type
 */

// ---------------------------------------------
// STEP 1: Fake request type
// ---------------------------------------------

$request_type = 'single'; // try: single | page | archive
// ---------------------------------------------
// STEP 2: Template selection logic
// ---------------------------------------------

function load_template($request_type) {

    if ($request_type === 'single') {
        return single_template();
    }

    if ($request_type === 'page') {
        return page_template();
    }

    return index_template();
}
// ---------------------------------------------
// STEP 3: Template files
// ---------------------------------------------

function single_template() {
    return "<h1>Single Post</h1><p>This is a blog post.</p>";
}

function page_template() {
    return "<h1>Page</h1><p>This is a static page.</p>";
}

function index_template() {
    return "<h1>Index</h1><p>Fallback template.</p>";
}
// ---------------------------------------------
// STEP 4: Render page
// ---------------------------------------------

echo load_template($request_type);
