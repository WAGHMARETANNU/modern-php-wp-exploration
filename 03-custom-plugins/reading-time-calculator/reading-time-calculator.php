<?php
/**
 * Plugin Name: Reading Time Calculator
 * Description: A logic-based plugin to estimate reading time.
 * Version: 1.1
 * Author: Tannu
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RTC_Calculator {

    public function __construct() {
        // We 'hook' our function into 'the_content' filter
        // 10 is the priority, 1 is the number of arguments
        add_filter( 'the_content', [ $this, 'display_reading_time' ], 10, 1 );
    }

    /**
     * This function now automatically attaches to the post content
     */
    public function display_reading_time( $content ) {
        $word_count = str_word_count( strip_tags( $content ) );
        $m_time = ceil( $word_count / 200 );

        $prefix = "<p style='color: #666; font-style: italic;'>";
        $prefix .= "⏱️ Estimated reading time: " . $m_time . " min";
        $prefix .= "</p><hr>";

        // We return the new prefix PLUS the original content
        return $prefix . $content;
    }
}

$rtc_calculator = new RTC_Calculator();