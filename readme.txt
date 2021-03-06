=== Cache Enabler 2 - WordPress Cache ===
Contributors: redcastor
Tags: cache, caching, wordpress cache, wp cache, performance, gzip, webp, http2
Requires at least: 4.6
Tested up to: 5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



A lightweight caching plugin for WordPress that makes your website faster by generating static HTML files plus WebP support.



== Description ==

= WordPress Cache Engine =
The Cache Enabler plugin creates static HTML files and stores them on the servers disk. The web server will deliver the static HTML file and avoids the resource intensive backend processes (core, plugins and database). This WordPress cache engine will improve the performance of your website.


= Features =
* Efficient and fast disk cache engine
* Automated and/or manual clearing of the cache
* Manually purge the cache of specific pages
* Display of the actual cache size in your dashboard
* Minification of HTML and inline JavaScript
* WordPress multisite support
* Custom Post Type support
* Expiry Directive
* Support of *304 Not Modified* if the page has not modified since last cached
* WebP Support (when combined with [Optimus](https://optimus.io/en/ "Optimus"))
* Supports responsive images via srcset since WP 4.4
* Works perfectly with [Autoptimize](https://wordpress.org/plugins/autoptimize/)
* Support WPML and Woocommerce

> Cache Enabler is the first WP plugin to allow you to serve WebP images without JavaScript and also fully supports srcset since WP 4.4. WebP is a new image format that provides lossless and lossy compression for images on the web. WebP lossless images are [26% smaller](https://developers.google.com/speed/webp/docs/webp_lossless_alpha_study#results "webp lossless alpha study") in size compared to PNGs.


= How does the caching work? =
This plugin requires minimal setup time and allows you to easily take advantage of the benefits that come from using Wordpress caching.

The Wordpress Cache Enabler has the ability to create 2 cached files. One is plain HTML and the other version is gzipped (gzip level 9). These static files are then used to deliver content faster to your users without any database lookups or gzipping as the files are already pre-compressed.

When combined with Optimus, the Wordpress Cache Enabler allows you to easily deliver WebP images. The plugin will check your upload directory for any JPG or PNG images that have an equivalent WebP file. If there is, the URI of these image will be cached in a WebP static file by Cache Enabler. It is not required for all images to be converted to WebP when the "Create an additional cached version for WebP image support" option is enabled. This will not break any images that are not in WebP format. The plugin will deliver images that do have a WebP equivalent and will fall back to the JPG or PNG format for images that don't.


= Website =
* [WordPress Cache Enabler - Documentation](https://www.keycdn.com/support/wordpress-cache-enabler-plugin/ "WordPress Cache Enabler - Documentation")


= System Requirements =
* PHP >=5.6
* WordPress >=4.6


= Contribute =
* Anyone is welcome to contribute to the plugin on [GitHub](https://github.com/keycdn/cache-enabler).
* Please merge (squash) all your changes into a single commit before you open a pull request.


= Maintainer =
* [ViaMonkey](https://www.viamonkey.com "ViaMonkey")


= Credits =
* Inspired by [Cachify](https://wordpress.org/plugins/cachify/).


== Changelog ==

= 2.2.0
* Add cache control field to settings.

= 2.1.1
* Add support woocommerce clean cache on product ordering "woocommerce_after_product_ordering"

= 2.1.0
* Improved compatibility plugins with check active plugin.
* Add support flush cache rest api for wp-rest-cache on action ce_action_cache_by_post_id_cleared.

= 2.0.3
* Add bypass cache based on user agent

= 2.0.2
* Add bypass if WP_CACHE defined and false

= 2.0.1
* Add user can editor clear cache options

= 2.0.0
* Add some third party plugins functionality (woocommerce and wpml)

= 1.3.2
* Add cleaner for support third party plugins
* Add support woocommerce and wpml.
* Add archive page clear cache by post id.
* Add param url on action "ce_action_cache_by_url_cleared"
* Add params post id on action "ce_action_cache_by_post_id_cleared"
* Remove clear_home class disk and dd compatibility home in _clear_dir.
* Bug fix cache return code 304.

= 1.3.1
* Fix for missing trailing slashes was incomplete
* Add filter option before minification

= 1.3.0 =
* Clear cache on woocommerce stock updates

= 1.2.3 =
* Fix expiry time
* Allow to customize bypass cookies
* Fix Autoptimize config warning
* Pages can now be excluded from cache by a path matching regex
* Plugin upgrades can now trigger cache clear
* Scheduled posts and drafts are now properly handled
* A missing trailing slash will now redirect like wordpress does by default

= 1.2.2 =
* Fixed settings form issue

= 1.2.1 =
* Minor fixes

= 1.2.0 =
* Added advanced cache feature
* Clear cache if reply to a comment in WP admin

= 1.1.0 =
* Added the possibility to clear the cache of a specific URL
* Supports now Windows filesystems
* Added X-Cache-Handler to indicate if loaded through PHP
* Support of WebP images generated by ewww
* Dynamic upload directory for WebP images
* Fixed multisite purge issue
* Added requirements checks
* Made plugin ready for translation

= 1.0.9 =
* Option to disable pre-compression of cached pages if decoding fails

= 1.0.8 =
* Added support for srcset in WP 4.4
* Improved encoding (utf8)

= 1.0.7 =
* Added cache behavior option for new posts
* Improved metainformation of the signature
* Optimized cache handling for nginx

= 1.0.6 =
* Fixed query string related caching issue

= 1.0.5 =
* Credits update

= 1.0.4 =
* Changed WebP static file naming

= 1.0.3 =
* Fixed WebP version switch issue

= 1.0.2 =
* Added support for WebP and CDN Enabler plugin

= 1.0.1 =
* Added WebP support and expiry directive

= 1.0.0 =
* Initial Release


== Screenshots ==

1. Display of the cache size in your dashboard
2. Cache Enabler settings page and "Clear Cache" link in the dashboard
