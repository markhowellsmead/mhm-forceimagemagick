<?php
/*
Plugin Name: Force ImageMagick
Plugin URI: https://github.com/mhmli/mhm-forceimagemagick/
Description: Forces WordPress to use ImageMagick instead of the PHP GD image library. This allows EXIF and IPTC data to be retained - for example, those containing GEO data and copyright information - but can lead to slightly larger file sizes.
Author: Mark Howells-Mead
Version: 1.0
Author URI: http://permanenttourist.ch/
*/

class MHMForceImageMagick {

    public $key     = '';
    public $version = '1.0';

    public function __construct(){
        $this->key = basename(__DIR__);
        add_filter('wp_image_editors', array($this, 'fi_force_imagick') );
    }
    
    public function fi_force_imagick() {
        return array('WP_Image_Editor_Imagick');
    }

}

new MHMForceImageMagick();
