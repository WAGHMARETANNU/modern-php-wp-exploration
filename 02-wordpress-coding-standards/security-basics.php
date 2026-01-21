<?php
/**
 * Module 02: WordPress Security Standards
 * Demonstrating Sanitization (Input) and Escaping (Output)
 */

// 1. SIMULATING INPUT (e.g., from a form)
// A malicious user might try to inject a script tag.
$raw_username = "john_doe <script>alert('Hacked!');</script>";
$raw_bio      = "I love <b>coding</b> and <a href='http://malicious.com'>free stuff</a>.";

// 2. SANITIZATION (Cleaning data before saving to a database)
// strip_tags is okay, but WordPress has specific functions for this.
$safe_username = sanitize_text_field( $raw_username );
$safe_bio      = sanitize_textarea_field( $raw_bio );

// 3. ESCAPING (Cleaning data before printing to the screen)
// This prevents Cross-Site Scripting (XSS).
?>

<div class="user-profile">
    <h2>User: <?php echo esc_html( $safe_username ); ?></h2>
    <p>Bio: <?php echo esc_textarea( $safe_bio ); ?></p>
</div>

<?php
/**
 * WHY THESE FUNCTIONS?
 * * sanitize_text_field(): Removes tags, extra whitespace, and line breaks.
 * esc_html(): Encodes characters like < and > so they don't run as HTML.
 */

// MOCK FUNCTIONS (Since we aren't inside a real WordPress environment yet)
// In a real WP site, you don't need to define these; they are built-in.
function sanitize_text_field( $str ) {
    return htmlspecialchars( strip_tags( trim( $str ) ) );
}

function sanitize_textarea_field( $str ) {
    return htmlspecialchars( trim( $str ) );
}

function esc_html( $str ) {
    return htmlspecialchars( $str );
}

function esc_textarea( $str ) {
    return htmlspecialchars( $str );
}