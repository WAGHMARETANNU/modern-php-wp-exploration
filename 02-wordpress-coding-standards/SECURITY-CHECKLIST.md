# WP Security Checklist

Quick reference for data handling functions.

## Input (Sanitization)
Use these when saving data from forms or APIs.

- sanitize_text_field: For strings, titles, and usernames. Strips tags and line breaks.
- sanitize_textarea_field: For bios/messages. Keeps line breaks but strips tags.
- sanitize_email: Validates email format and removes invalid characters.
- esc_url_raw: Use this for saving URLs to the DB.

## Output (Escaping)
Use these right before 'echo' to prevent XSS.

- esc_html: For plain text inside tags like <div> or <span>.
- esc_attr: For text inside HTML attributes like value="" or alt="".
- esc_url: For href and src attributes.
- esc_textarea: Specifically for displaying saved text inside a <textarea>.

## Trusted HTML (KSES)
- wp_kses_post: Allows safe HTML (like <b>, <i>) used in posts.
- wp_kses: Define an array of specific tags you want to allow.

## Rule of Thumb
1. Sanitize on input.
2. Escape on output (Late Escaping).
3. Never trust $_POST or $_GET data.