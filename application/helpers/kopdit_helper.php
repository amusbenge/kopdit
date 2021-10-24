<?php

function is_logged_in()
{
    $ci =  get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('admin/auth');
    }
    else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1).'/'.$ci->uri->segment(2);
        
        $userAccess = $ci->db->from('admin_access_menu')
        ->join('admin_menu', 'admin_menu.menu_id = admin_access_menu.menu_id')
        ->join('admin_sub_menu', 'admin_sub_menu.menu_id = admin_menu.menu_id')
        ->where('admin_sub_menu.url', $menu)
        ->where('admin_access_menu.role_id', $role_id)->get();

        //buat pengkondisian    
        if ($userAccess->num_rows() < 1) {
            redirect('admin/auth/blocked');
        }
    }
}

function is_login(){
    $ci = get_instance();

    if(!$ci->session->userdata('email')){
        redirect('auth');
    }
}
