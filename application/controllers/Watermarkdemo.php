<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Watermarkdemo extends \CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
    }
    public function text()
    {
        $config['source_image'] = './uploads/text.jpg';
        //The image path,which you would like to watermarking
        $config['wm_text'] = 'arjunphp.com';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './fonts/atlassol.ttf';
        $config['wm_font_size'] = 16;
        $config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'right';
        $config['wm_padding'] = '20';
        $this->image_lib->initialize($config);
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        } else {
            echo 'Successfully updated image with watermark';
        }
    }
    public function overlay()
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/over.jpg';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './uploads/logo.png';
        //the overlay image
        $config['wm_opacity'] = 50;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'right';
        $this->image_lib->initialize($config);
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        } else {
            echo 'Successfully updated image with watermark';
        }
    }
}