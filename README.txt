=== Plugin Name ===
Contributors: markparnell
Tags: tahd, widget, feed the hungry, take away hunger day
Requires at least: 3.0.1
Tested up to: 6.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display live tallies for Take Away Hunger Day

== Description ==

Display live tallies for Take Away Hunger Day via a simple shortcode.

Once the plugin is installed and activated, just add the `[tahd_widget]` shortcode where you want the widget to be displayed. The shortcode accepts the following parameters:

* `campaign_id` **Required**. Tells the widget which campaign to display stats for. This will be provided to you by Feed The Hungry.
* `layout`  **Optional**. Accepts either `square` (default) or `rectangle`.
* `display` **Optional**. Determines whether stats include all gifts for the day or just those given via the specific campaign. Accepts either `local` (default) or `national`.
* `width`   **Optional**. If set will force the image to the specified width (in pixels).

Examples: 

`[tahd_widget campaign_id="12345"]`
`[tahd_widget campaign_id="12345" layout="rectangle" display="national"]`
`[tahd_widget campaign_id="12345" width="150"]`

== Installation ==

1. In WordPress, go to Plugins -> Add New and upload `tahd-widgets.zip`
1. Activate the plugin
1. Place the `[tahd_widget]` shortcode where you want the widget to be displayed

== Changelog ==

= 1.0 =
* Initial release
