=== WP Visual Adverts ===
Contributors: webcodin
Tags: ad, ads, advert, adverts, visual adverts, widget, sidebar, ajax, WooSidebars, groups, categories
Requires at least: 3.5.0
Tested up to: 4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

WP Visual Adverts plugin allows you to quickly and easily create ads to display in the sidebar of your site.

== Description ==

WP Visual Adverts plugin allows you to quickly and easily create different types of advertisements and group them into categories to display in the sidebar of your site.

With this plugin you can easily create:

* Various promotional ads;
* Featured news for your blog or news portal;
* Banners with discount / sale / campaign for your store;
* Advertisements with links to your partners;
* Interesting headlines with pictures to share with your community;
* ... and much more.

You can find [live demo](http://wpdemo.webcodin.com/wordpress-plugin-wcp-visual-adverts/) on our site.

= Features =

* Easily way to create ads;
* Creation of various advert types: graphic (single picture), text ads, combined Ads (title / picture / description);
* Addition of external and internal links to the ads;
* Grouping ads by category;
* AJAX-update of ad groups;
* Setting of a custom image size, number of displayed ads, and animation settings;
* Uses the default theme styling;
* Compatible with WooSidebars;
* Developers have the possibility to customize the plugin by creating a duplicate templates and styles in the active theme folder;
* **NEW!** Custom options for widgets: text color, ads number, animation options.
* **NB!** The core of the plugin has been changed and optimised for adding a new useful features. We forced to raise the requirements to PHP version on Your web server. **Minimum required PHP version - 5.3.0**.
 
= Upcoming Updates =
* ads group shortcode for pages
* statistic per click

More information and documentation can be found in the sections [screenshots](https://wordpress.org/plugins/wp-visual-adverts/screenshots/) and [FAQ](https://wordpress.org/plugins/wp-visual-adverts/faq/).

If you want to help with plugin improvement, please leave your feedback or suggestions for future updates.

== Installation ==

1. Download a copy of the plugin
2. Unzip and Upload 'wp-visual-adverts' to a sub directory in '/wp-content/plugins/'.
3. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= How can I create ad categories =

To create an ad group, go to the menu: "Visual Adverts"> "Adverts"> "Categoties".
Set ad group name and click "Add New Category".

More information can be found in the section [screenshots](https://wordpress.org/plugins/wp-visual-adverts/screenshots/).

= How can I create an ad =

To create an ad, go to the menu: "Visual Adverts"> "Adverts" Click on the "Add New" to create a new ad.

To create different types of ads you can use the following parameters:

* **Post Title** - allows to set ad headline;
* **Post Descriptions** - allows to set ad description;
* **Link** - allows to set external or internal ad link;
* **Post Featured Image** - allows to set ad image;
* **Advert Categories** metabox - allows to set ad categories.

More information can be found in the section [screenshots](https://wordpress.org/plugins/wp-visual-adverts/screenshots/).

= How can I get image ad? =

Create a new ad, upload featured image and save ad. Now you have ready-to-use image ad.

= How can I get simple text ad? =

Create a new ad, fill "Post Description" in and save ad. Now you have ready-to-use simple text ad.

= How can I get text ad with headline? =

Create a new ad, fill "Post Title" and "Post Description" in and save ad. Now you have ready-to-use text ad with headline.

= How can I get clickable ad? =

Create a new ad, fill all necessary fields in including "link" field and save ad. Now you have ready-to-use clicable.

= Widgets =

To add a widget to the sidebar, go to the menu: "Appearance"> "Widgets", select widgets "WP Visual Adverts" and drag it to the desired sidebar.

Following options are available for configuring in the widget:

* **Title** - allows to set widget headline;
* **Category** - allows to set ads group for displaying; by default will be displayed all existed adverts;
* **Font Color** - allows to set widget text color.
* **Refresh Time**/**Animation Speed**: - allows to set animation options
* **Advert Count** - allows to set custom number of displayed ads for widget.

More information can be found in the section [screenshots](https://wordpress.org/plugins/wp-visual-adverts/screenshots/).

= General Settings =

To change the global plugin settings, go to the menu: "Visual Adverts"> "Settings".

You can configure the following options:

* **Advert Image Size** - allows to set default custom size of the ad image. <br>**NB! Please use "Regenerate Thumbnails" plugin (https://wordpress.org/plugins/regenerate-thumbnails/) or similar one for properly displaying of custom thumbnails after customization of this plugin option;**
* **Refresh Time** (msec) - allows to set custom time between ads updates; in order if you need to disable ads refreshing, you can set this option to zero value;
* **Animation Speed** (msec) - allows to set speed for fade in/fade out animation effect;
* **Advert Count** - allows to set custom number of displayed ads inside groups.

**NB!** All options will be used as initial for all new widgets with ads after options update.

More information can be found in the section [screenshots](https://wordpress.org/plugins/wp-visual-adverts/screenshots/) and [FAQ](https://wordpress.org/plugins/wp-visual-adverts/faq/).

= How to disable AJAX updates of Adverts? =

Set "Refresh Time" as "0" in plugin settings

= How can I style the widget content? =

**NB!** Developers only
The plugin includes CSS file "assets/css/style.css".
You can copy this file in your active theme and customize it for your needs.
Path to the styles inside the active theme:

[ActiveTheme]/templates/wp-visual-adverts/assets/css/style.css

= How can I change the widget content? =

**NB!** Developers only
The plugin includes some templates in "templates/" folder. 
You can copy any template in your active theme and customize it for your needs. 
Path to the templates folder inside the active theme:

[ActiveTheme]/templates/wp-visual-adverts/

== Screenshots ==

1. Adverts Samples
2. Adverts Samples
3. Adverts Samples
4. Adverts Samples
5. Admin Panel :: Adverts List
6. Admin Panel :: Advert Details
7. Admin Panel :: Categories
8. Admin Panel :: Settings
9. Admin Panel :: Widgets Options

== Changelog ==
= 2.0.4 =
* Changed: Rule of random selection for adverts.

= 2.0.3 =
* Fixed: Issue "Ads not displaying" for some themes
* Changed: Default "Animation Speed" value increased to 1000 msec. for more stability (Please, change this value manually in existing widget, if it actually for You).
* Added: Link to live demo site in description of the plugin

= 2.0.2 =
* Fixed: Issue with fatal error when trying to activate plugin for PHP 5.3
* Fixed: Issue for AJAX request with enabled Zlib-compression
* Changed: Height calculation for advert widget when a advert block is loaded
* Minor changes of the plugin core

= 2.0.1 =
* Minor changes 
* Changed: Image loading and height calculation for advert widget when a page is first loaded

= 2.0.0 =
* Changed: The plugin core is optimised for adding a new useful features
* Changed: Minimum required PHP version - 5.3.0 
* Fixed: Issue with a height calculation for advert widget when a page is first loaded

= 1.2.0 =
* Global changes of the plugin core
* Added: personal options for widget: ads number & animation settings

= 1.1.1 =
* Minor changes of the plugin core

= 1.1.0 =
* Added: adverts categories
* Added: category widget option
* Added: personal widget text color option
* Updated: plugin description, screenshots & FAQ

= 1.0.3 =
* Minor bugfixing

= 1.0.2 =
* Fixed issue: "plugin stops functioning after a few refreshes"
* Added: multiple widgets contain different adverts after refreshing

= 1.0.1 =
* Minor bugfixing

= 1.0.0 =
* Initial release.
