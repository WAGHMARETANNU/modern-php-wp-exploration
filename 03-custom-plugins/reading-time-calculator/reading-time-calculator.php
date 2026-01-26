<?php
/**
 * Plugin Name: Reading Time Calculator
 * Description: Displays estimated reading time for posts.
 * Version: 1.1.0
 * Author: Tannu Waghmare
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/src/ContentStats.php';
require_once __DIR__ . '/src/Plugin.php';

new \ModernWeb\Plugin\ReadingTimePlugin();
