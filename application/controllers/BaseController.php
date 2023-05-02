<?php
defined('BASEPATH') or exit('No direct script access allowed');

abstract class BaseController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->member_permission() == FALSE) {
            redirect(base_url() . 'home/login', 'refresh');
        }
        
        $this->load->library('paypal');
        $this->load->library('pum');
        $this->system_name = $this->Crud_model->get_type_name_by_id('general_settings', '1', 'value');
        $this->system_email = $this->Crud_model->get_type_name_by_id('general_settings', '2', 'value');
        $this->system_title = $this->Crud_model->get_type_name_by_id('general_settings', '3', 'value');
        setcookie('lang', $this->session->userdata('language'), time() + (86400), "/");
    }

    protected function member_permission()
    {
        $login_state = $this->session->userdata('login_state');
        if ($login_state == 'yes') {
            $member_id = $this->session->userdata('member_id');
            if ($member_id == NULL) {
                return FALSE;
            } else {
                $this->db->where('member_id', $member_id)->update('member', array('isOnline' => strtotime(date('Y-m-d H:i:s', strtotime('+30 minute')))));
                $this->db->where('member_id', $member_id)->update('member', array('isOnlineTimezone' => gmdate('Y-m-d\TH:i:s.') . '000Z'));
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
}
