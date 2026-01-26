<?php

namespace ModernWeb\Plugin;

use ModernWeb\Logic\ContentStats;

class ReadingTimePlugin {

    public function __construct() {
        add_filter('the_content', [$this, 'addReadingTime']);
        add_action('admin_menu', [$this, 'registerSettingsPage']);
        add_action('admin_init', [$this, 'registerSettings']);
    }
public function registerSettings(): void {
    register_setting('rtp_settings', 'rtp_wpm', [
        'type' => 'integer',
        'default' => 200,
        'sanitize_callback' => 'absint'
    ]);

    register_setting('rtp_settings', 'rtp_enabled', [
        'type' => 'boolean',
        'default' => true
    ]);
}
public function registerSettingsPage(): void {
    add_options_page(
        'Reading Time Settings',
        'Reading Time',
        'manage_options',
        'reading-time',
        [$this, 'settingsPageHTML']
    );
}
public function settingsPageHTML(): void {
?>
<div class="wrap">
    <h1>Reading Time Settings</h1>

    <form method="post" action="options.php">
        <?php settings_fields('rtp_settings'); ?>

        <table class="form-table">
            <tr>
                <th>Words Per Minute</th>
                <td>
                    <input type="number"
                           name="rtp_wpm"
                           value="<?php echo esc_attr(get_option('rtp_wpm', 200)); ?>">
                </td>
            </tr>

            <tr>
                <th>Enable Plugin</th>
                <td>
                    <input type="checkbox"
                           name="rtp_enabled"
                           value="1"
                           <?php checked(get_option('rtp_enabled', 1)); ?>>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>
<?php
}


    public function addReadingTime(string $content): string {

        if (!is_singular('post')) {
            return $content;
        }

        $wpm = (int) get_option('rtp_wpm', 200);
        $enabled = (bool) get_option('rtp_enabled', true);

        if (!$enabled) {
            return $content;
        }

        $stats = new ContentStats($wpm);
        $time = $stats->getReadingTime($content);

        if ($time === 0) {
            return $content;
        }

        $label = esc_html__("Reading Time", "reading-time-plugin");

        return "<p><strong>{$label}:</strong> {$time} min</p>" . $content;
    }
}
