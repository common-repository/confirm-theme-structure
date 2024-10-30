=== Confirm Theme Structure ===
Contributors: R3098, ts51
Tags:customize,theme,template,woocommerce,codec,check,database,managemen,カスタマイズ,テーマ,テンプレート,コーデック,データベース,管理
Stable tag: 2.1.1
Requires at least: 4.9
Tested up to: 6.2.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires PHP: 5.6

== Description ==
WordPress themes consist of a variety of templates, which makes customization difficult.
This plugin allows you to see all the templates used to display the current page.
Of course, if you are using a child theme, you can also understand the structure of the parent theme as well.
This plugin can be used to create an environment that is easy to customize when templates are loaded in a complex way and the theme editor does not know what to do with them.

The following basic template is used in WordPress.

functions.php
header.php
sidebar.php
footer.php
index.php
page.php
single.php
archive.php

In fact, there are various original files included in addition to these, and some themes consist of nearly 200 templates.

From 2.0.2, it is also possible to extract the configuration template loaded from the plugin folder when using WooCommerce.

= Plugin features =

While logged in, click [CTS Page Display Info] in the administration bar to display the template used for the currently displayed page and other information.
Close the information window by clicking on the Close button in the lower right corner of the display information or by clicking again on the [CTS Page Display Info].

***No Coding***
***No Setting***

All you have to do is install it and you don't need to do any configuration.
Please display the WordPress admin bar.

"Confirm Theme Structure" is a plug-in of the source which was released around 2013.
Since then, we've continued to maintain it, and it's safe to use even the latest WordPress.
In addition to theme template information, you can also get the following information to help you maintain and check compatibility.

1. WordPress version
2. PHP version
3. Database Information

It's a useful plugin for creating your own website, customizing themes, and even managing a lot of sites.

= Contributions =
Anyone can contribute to the "Confirm Theme Structure".
There are several ways to contribute.

1. Raise an [Issue](https://wordpress.org/support/plugin/confirm-theme-structure/#new-post)
2. Plug-in translation [different languages](https://translate.wordpress.org/projects/wp-plugins/confirm-theme-structure/)
3. Provide feedback and suggestions on [enhancements](https://wordpress.org/support/plugin/confirm-theme-structure/#new-post)

== Installation ==
This is a simple plugin that just installs and activates.There is no need to set anything.

== Screenshots ==
1. Click on "CTS Page Display Info" in the adminbar to display the information

== Changelog ==
= 2.1.1 =
* Added IP address of hosting server to display information.

= 2.1.0 =
* Block Theme with different compositional contents from the previous ones are identified and messages are displayed.
* Operation check with WordPress 6.1

= 2.0.9 =
* Changed behavior so that the window is not closed on mouse click to facilitate copying of displayed information.
Instead, a Close button is provided in the lower right corner.
* Operation check with WordPress 6.0.2

= 2.0.8 =
* Some corrections to the translation files

= 2.0.7 =
* Change the display name on the admin bar to "CTS Page Display Info"
* Added display of database size

= 2.0.6 =
* Added display of database table prefixes

= 2.0.5 =
* Operation check with WordPress 5.7.1
* Renewal of readme file

= 2.0.4 =
* Changed selector name in confirm-theme-structure.js to avoid conflicts

= 2.0.3 =
* Fixed a display error in the case of non-child themes

= 2.0.2 =
* WooCommerce support

= 2.0.1 =
* Supported version update

= 2.0.0 =
* Adjusted the way it is displayed, including child themes

= 1.9.7 =
* Review of translation items
* Renewal of readme file

= 1.9.6 =
* Support WordPress 5.4.1

= 1.9.5 =
* Added the display of the database name.

= 1.9.4 =
* Fixed some translation issues

= 1.9.3 =
* Operation check with WordPress 5.3.2

= 1.9.0 =
* Display storage engine

= 1.8.0 =
* UPDATED: Added display of MySQL version

= 1.5.0 =
* UPDATED: Change interface

= 1.4.0 =
* UPDATED: Check with WordPress 5.0

= 1.0.0 =
* Initial release
