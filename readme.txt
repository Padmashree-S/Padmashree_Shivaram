=== Lyretail ===
Contributors: automattic
Tested up to: 4.6.1
Stable tag: 3.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lyretail is based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc.

== Description ==

Lyretail is designed to put your social presence front and center by displaying your social links menu prominently below the site title and logo, so readers can easily find you on your favorite social networks.

== Bundled Licenses ==

* Google Fonts "Abril Fatface" and "Lato" are licensed under the SIL Open Font License, Version 1.1; Source: https://www.google.com/fonts/
* Genericons icon font, Copyright 2013 Automattic; Genericons are licensed under the terms of the GNU GPL, Version 2 (or later); Source: http://www.genericons.com

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

== Where is my Custom Menu? ==

Lyretail includes an optional navigation menu in the slide-down menu, accessed by clicking the arrow icon in the upper right corner of the header. Custom Menus are configured by going to Appearance -> Menus in your Dashboard.

== Where can I add widgets? ==

Lyretail includes three optional columns in the slide-down widget area, accessed by clicking the arrow icon in the upper right corner of the header. Widgets are configured by going to Appearance -> Widgets in your Dashboard.

== How can I add links to my social networks? ==

You can add links to a multitude of social services in the header area using the following steps:

1. Create a new Custom Menu, and assign it to the Social Links menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will appear in the header, beneath your site title and/or logo.

= Quick Specs (all measurements in pixels) =

* The main column width is 660.
* The slide-down menu width varies depending on the screen size and number of active widget areas.
* Custom Header dimensions are fluid, displayed at varying widths and heights, depending on the screen size.

== Changelog ==

= 8 June 2017 =
* Make sure long words in text widget are not overflowing container. Bump version number.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 6 October 2016 =
* Multiple

= 8 June 2016 =
* Add Headstart annotations;

= 21 January 2016 =
* Hide .menu-toggle when there are no menu and no widgets.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 27 February 2015 =
* Ensure captioned images display correctly after infinite scroll loads; only apply special caption styles to images that meet certain height/width requirements, rather than using a CSS selector to determine the style.

= 24 February 2015 =
* Add readme.txt in preparation for submission to .org
* Add theme description in preparation for launch.
* Move toggled menu icon to fix to the top of the site header, so we don't get jumpiness from it moving back to the top on close
* Move menu toggle button to bottom of menu when opened
* Write some jQuery to take into account linked captioned images to style them if full size or large size
* Adjust line height on Rate This text
* Adjustments to buttons and form fields to make them easier to
* Minor improvements to Author widget styles
* Add wpcom-specific styles
* Ensure nested blockquotes don't inherit the before and after pseudo-elements
* Specify font size on Genericons so they don't change size when body font changes in Custom Fonts
* Update custom header fonts enqueue function to use admin_enqueue_scripts with a $hook_suffix conditional, rather than admin_print_scripts
* Remove unnecessary title tag in header.php; Minnow now supports title-tag

= 20 February 2015 =
* Clean up functions.php; add editor styles
* Add languages files; rename sidebar areas to make more sense, since they're not really sidebars, but widget areas
* Remove text-decoration from pseudo-elements for IE
* Force site title to be white when Custom Headers/Featured Images are present, using a class on the body tag; add screenshot
* Add RTL styles
* Add top margin to entry meta
* Try using the correct selector. >:(
* Try hiding menu with display: none and activating with block to
* Oops; add the necessarily .focus style for touch devices.
* Another attempt to fix submenu display for touch devices
* Better padding/styles/alignment for submenus; attempt to fix touchscreen bug where submenus can't be accessed
* Update link colors; add touchscreen solution for drop-down menus

= 19 February 2015 =
* Remove different color styles for current menu items
* More padding adjustments for inputs; style cite tags
* Reduce page header and title margins
* Remove outline for inputs; increase padding slightly
* Reduce padding for primary inputs; only add more padding in widget area inputs
* Style tables, headings
* Style headings for better clarity
* Styles for main navigation
* Styles for main navigation for small screens
* Style main navigation at a larger screen resolution
* Begin styling second iteration of menu, moving it into a horizontal alignment below the widget areas
* Give social links a bit less opacity by default
* Remove separator for small screens, use it to break site footer content into two lines
* Add more padding to inputs; fix background color on mobile devices in widget area/toggle menu
* Adjust link and widget title colors; reduce top margin on comment meta
* Add support for featured header images; update colors to better work with the design; speed up menu toggle
* Add tags to style.css
* Remove outline in widget area inputs since we have a dark outline border applied
* Add visited link styles for footer
* Adjust post bottom margin for smaller screens
* Use bullets instead of raquos for bulleted lists in the navigation and widget areas
* Revert theme support for title-tag; too complicated to override Minnow's settings. If we want to add support for the title tag, it should be done via the parent theme, Minnow
* Style inputs in widgets to avoid background color conflict; style menu toggle color when on to have more contrast
* minor fixes for social links when custom header image is active; fix for tables in widgets
* Adjust page header color to better match theme
* Adjustments to hide ultra-thin border that was making :after elements for social links aliased
* Fix site title hover flashing bug in Firefox
* Experiment to let social link icons inherit the background image of the custom header for a transparent text effect
* reduce blockquote font size for smaller screens; style footer with transition and margin on separator; style buttons/inputs/older posts button.
* Only apply large font size to site title for tablets/desktops
* Begin implementing custom header images
* Adjust content width; add styles for captions
* Ensure no line appears through entry meta when there is no entry title

= 18 February 2015 =
* Refactor header to avoid empty markup if no widgets or menu is assigned to the header toggle menu area
* Align post format icons better with the corresponding text

= 17 February 2015 =
* Shim for title functionality
* Additional
* Begin styling widget areas and navigation menu; fix for entry title pipes before and after; add new sidebar.php file to handle multiple widget areas; register new widget areas
* Begin styling menu toggle button
* Begin styling elements and adjusting templates to match mock-ups
* Renaming directory
