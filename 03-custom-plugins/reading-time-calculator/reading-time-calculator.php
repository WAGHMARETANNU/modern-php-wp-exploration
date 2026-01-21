<?php
/**
 * Plugin Name: Reading Time Calculator
 * Description: A logic-based plugin to estimate reading time.
 * Version: 1.0
 * Author: Tannu
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The core logic is wrapped in a class to stay organized.
 */
class RTC_Calculator {

    public function __construct() {
        // This is where we will eventually "hook" into WordPress.
    }

    public function calculate( $content ) {
        $word_count = str_word_count( strip_tags( $content ) );
        $m_time = ceil( $word_count / 200 );

        return $m_time;
    }
}

// Initialize the class
$rtc_calculator = new RTC_Calculator();