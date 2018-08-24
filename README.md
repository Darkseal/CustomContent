# MantisBT CustomContent Plugin

Copyright (c) 2017-2018, Ryadel - https://www.ryadel.com/

Released under the [GNU General Public License v3](http://opensource.org/licenses/GPL-3.0)

## Description

The ***CustomContent*** plugin can be used to include custom HTML, PHP, JS or CSS content within the MantisBT HTML layout structure.
It has been originally developed to provide a workaround for the [MantisBT bug #22098](https://www.mantisbt.org/bugs/view.php?id=22098),
based upon the fact that the `$g_top_include_page` and `$g_bottom_include_page` global variables are not supported / not working anymore.


## Installation

1. Download this package as a single zip file & unzip it in the `/mantisbt/plugins/` folder of your current MantisBT installation.

2. Rename the resulting folder to `/CustomContent/`, so that the main plugin PHP file will have the following path: `/mantisbt/plugins/CustomContent/CustomContent.php`.

3. While logged into your Mantis installation as an administrator, go to
   'Manage' -> "Manage Plugins".

4. In the "Available Plugins" list, you'll find the "CustomContent" plugin.
   Click "Install".

5. Navigate to the `/mantisbt/plugins/CustomContent/inc` folder and edit/modify the content files accordingly (see ***Usage*** below).

6. Open the `/mantisbt/config/config_inc.php` (the MantisBT configuration file) and add the following lines:

~~~~
# CustomContent Plugin settings
# ------------------------------------------------------

# this file will be included right after the opening <body> tag
$g_custom_body_begin_file = "%absolute_path%/plugins/CustomContent/inc/custom_body_begin_file.php";

# this file will be included at the end of the header layout section, i.e. the main menu
$g_custom_page_header = "%absolute_path%/plugins/CustomContent/inc/custom_page_header_file.php";

# this file will be included at the end of the footer layout section, i.e the Mantis copyright
$g_custom_page_footer = "%absolute_path%/plugins/CustomContent/inc/custom_page_footer_file.php";

# this file will be included right before the closing <body> tag
$g_custom_body_end_file = "%absolute_path%/plugins/CustomContent/inc/custom_body_end_file.php";
~~~~

Feel free to change the folders, paths & filenames accordingly to your needs.

## Usage
You can use the included files just any other PHP file: you can include PHP code, `<script>`, `<link>` and `<style>` elements to link external JS and CSS files or include internal code, images, text and so on.


## Supported Versions

- MantisBT 1.x - not supported
- MantisBT 2.x - supported

## Official Website
- https://www.ryadel.com/
