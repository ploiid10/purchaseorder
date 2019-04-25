<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    public function layout($view, $data = array()) {
       $ci = get_instance();
       $view_data['content_view'] = $view;
      //  $view_data['topbar'] = "includes/topbar";
      //  $view_data['left_menu'] = "layouts/sidemenu";
      $view_data = array_merge($view_data, $data);
       $ci->load->view('layouts/index', $view_data);
    }

}
