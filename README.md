# Glacial ACF Blocks
WP plugin with collection Gutenberg Blocks built with Advanced Custom Fields. Includes dev environment with a local server, file watchers and hot reload of CSS, SASS, CSS prefixing, CSS/JS minification, image compression and auto saving of ACF setup JSON.

:technologist:	:woman_technologist:

## Blocks Included
### 1. Pillar Link
CSS Grid links with options for row numbers and spacing, background image, and all custom colors

### 2. Before and After
Before and After Module with 3 images: Before Cataract Surgery, After Cataract Surgery, Advanced Technology Lenses. Custom images and custom number of images can be used with vertical or horizontal layout.

### 3. Sticky Menu
Menu that will stick to the top of page using css sticky position. Offers adjustments for fixed header. All other blocks can be used inside the menu.

## Install Methods

### 1. To Just Use Plugin - WP Plugin Install
Download zip of latest release here: https://github.com/Glacial-Web/glacial-acf-blocks/releases/latest and install in WordPress admin.

### 2. For Dev Work - Clone Repo
```bash
$ cd wp-install/wp-content/plugins
$ git clone https://github.com/gconrad0/glacial-acf-blocks
$ cd glacial-acf-blocks
```
To use local WP install change projectURL in wpgulp.config.js file. then run:
```bash
$ npm install
$ npm start
```



#### File Placement and Setup
* Register your block in register-blocks.php
    * Rendering blocks is done with callback function in main plugin file (glacial-acf-block.php).
    * In acf_register_block_type() use:
        * 'render_callback' => 'glacial_blocks_template',
        * 'category'        => 'glacial-blocks',
        * No need to enqueue style as this is done via wp_enqueue_style
* PHP block templates go in /block-templates
* SASS goes in /assets/scss/blocks
    * Name your file _your-block-name and @import file in glacial-blocks.scss
    * CSS is enqueued in register-blocks.php

#### Wordpress Admin

All field groups created will be automatically saved in /glacial-acf-json. When the group is changed the files will update

To import ACF field group from existing blocks, go to Field Groups in ACF and look in 'Sync available' section for the block you want to import

In Gutenberg editor, blocks appear in newly created category Glacial Blocks.

That's it. Happy building :smile_cat: For info on building ACF blocks visit https://www.advancedcustomfields.com/resources/blocks/


