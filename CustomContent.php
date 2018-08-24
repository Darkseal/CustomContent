<?php
/*
** --------------------------------------------------------------
** MantisBT CustomContent Plugin
** --------------------------------------------------------------
** v1.0.180824
**
** Copyright (c) 2017-2018, Ryadel - https://www.ryadel.com/
** Released under the GNU General Public License v3 - http://opensource.org/licenses/GPL-3.0
*/

class CustomContentPlugin extends MantisPlugin {

    public function register() {
        $this->name = 'CustomContent Plugin';
        $this->description = 'Enables the usage of various configuration parameters to insert custom HTML, PHP, JS and/or CSS content in the Mantis HTML layout';

        $this->version = '0.1.0';
        $this->requires = array(
        'MantisCore' => '2.0.0'
        );

        $this->author = 'Ryadel';
        $this->contact = 'web@ryadel.com';
        $this->url = 'https://www.ryadel.com/';
    }

    public function hooks() {
        return array(
            'EVENT_LAYOUT_RESOURCES' => 'custom_head',
            'EVENT_LAYOUT_BODY_BEGIN' => 'custom_body_begin',
            'EVENT_LAYOUT_BODY_END' => 'custom_body_end',
			'EVENT_LAYOUT_PAGE_HEADER' => 'custom_page_header',
			'EVENT_LAYOUT_PAGE_FOOTER' => 'custom_page_footer'
        );
    }

    public function custom_head($p_event) {
		$this->custom_render('custom_head_file');
    }

	public function custom_body_begin($p_event) {
		$this->custom_render('custom_body_begin_file');
    }

	public function custom_body_end($p_event) {
		$this->custom_render('custom_body_end_file');
    }
	
	public function custom_page_header($p_event) {
		$this->custom_render('custom_page_header_file');
    }
	
	public function custom_page_footer($p_event) {
		$this->custom_render('custom_page_footer_file');
    }
	
	private function custom_render($key) {
		$t_page = config_get_global($key);
		if( !is_blank( $t_page ) && file_exists( $t_page ) && !is_dir( $t_page ) ) {
			include( $t_page );
		}
	}
}