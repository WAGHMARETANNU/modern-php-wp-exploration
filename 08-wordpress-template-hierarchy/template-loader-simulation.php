<?php
/**
 * Simulating WordPress Template Hierarchy Logic
 * This is NOT WordPress core — just learning logic
 */

function load_template_simulation($type) {
    if ($type === 'single') {
        if (file_exists('single.php')) {
            echo "Loaded: single.php";
        } else {
            echo "Fallback: index.php";
        }
    }

    if ($type === 'page') {
        if (file_exists('page.php')) {
            echo "Loaded: page.php";
        } else {
            echo "Fallback: index.php";
        }
    }
}

load_template_simulation('single');
