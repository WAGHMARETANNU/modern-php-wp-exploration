# WP Dev Lab

Personal workspace for testing WordPress Coding Standards (WPCS) and Gutenberg development.

## Project Structure

- **/01-php-logic**: Basic PHP classes. Focused on logic separation and unit testing.
- **/02-wordpress-coding-standards**: Exercises on data security. Covers `sanitize_` and `esc_` function families.
- **/03-custom-plugins**: Boilerplate for logic-based plugins. Includes `ABSPATH` checks and Hook implementation (`add_filter`).
- **/04-gutenberg-blocks**: Modern JS/React blocks using the `block.json` API.

## Core Concepts Implemented

- **Security**: Input sanitization and late escaping to prevent XSS.
- **Hooks**: Using the WordPress Filter API to modify post data dynamically.
- **Metadata**: Registration of blocks via JSON to optimize script loading.

## Testing
Logic is verified via PHP CLI using mock environments to simulate WordPress core functions without the overhead of a full install.
