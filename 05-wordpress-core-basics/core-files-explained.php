<?php
/**
 * This file explains important WordPress core files.
 */

// index.php
// ------------------------------------
// This is the ENTRY POINT of WordPress.
// Every request eventually comes here.
echo "index.php -> Entry point of WordPress\n";

// wp-config.php
// ------------------------------------
// Contains database credentials and site configuration
echo "wp-config.php -> Database & config loaded\n";

// wp-settings.php
// ------------------------------------
// Loads WordPress core files, plugins, and themes
echo "wp-settings.php -> Core files loaded\n";

// functions.php (Theme file)
// ------------------------------------
// Used to add custom behavior using hooks
echo "functions.php -> Theme functionality loaded\n";

// Plugins
// ------------------------------------
// Plugins hook into WordPress without modifying core
echo "Plugins -> Extend WordPress safely\n";
