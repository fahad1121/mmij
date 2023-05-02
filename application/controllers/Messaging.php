<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('BaseController.php');

class Messaging extends BaseController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Message_model', 'message');
    }


    function chat($id)
    {
        $member_id_user = $this->session->userdata('member_id');
        if ($this->db->get_where("member", array("member_id" => $member_id_user))->row()->is_blocked == 'yes') {
            $this->session->set_flashdata('alert', 'blocked');

            redirect(base_url() . 'home/profile', 'refresh');
        } else if ($id != "" || $id != NULL) {
            $is_valid = $this->db->get_where("member", array("member_id" => $id))->row()->member_id;
            if (!$is_valid) {
                redirect(base_url() . 'home', 'refresh');
            }
            if ($this->db->get_where("member", array("member_id" => $id))->row()->is_closed == 'yes') {
                redirect(base_url() . 'home', 'refresh');
            }
            $member_id = $this->session->userdata('member_id');
            $ignored_ids = $this->Crud_model->get_type_name_by_id('member', $member_id, 'ignored');
            $ignored_ids = json_decode($ignored_ids, true);

            if (!in_array($id, $ignored_ids) && $id != $member_id) {

                $page_data['title'] = "Member Profile || " . $this->system_title;
                $page_data['top'] = "profile.php";
                $page_data['page'] = "chat";
                $page_data['bottom'] = "profile.php";
                $page_data['get_member'] = $this->db->get_where("member", array("member_id" => $id))->result();
                $page_data['messagesList'] = $this->message->getUserChatHistory($member_id_user);

                $this->load->view('front/index', $page_data);
            } else {
                redirect(base_url() . 'home/listing', 'refresh');
            }
        } else {
            redirect(base_url() . 'home/listing', 'refresh');
        }
    }

    public function loadMessages() {
        $user_id = $this->session->userdata('member_id');
        $page_data['listed_messaging_members'] = $this->Crud_model->get_listed_messaging_members($user_id);
        $page_data['get_member'] = $this->db->get_where("member", array("member_id" => $user_id))->result();
        $page_data['messagesList'] = $this->message->getUserChatHistory($user_id);
        $this->load->view('front/profile/messaging/index', $page_data);
    }

    public function getThreadId($member_id) {
        $user_id = $this->session->userdata('member_id');

        $record = $this->message->getMessageThreadId($member_id, $user_id);
        if($record) {
            $res = array('status' => 'success', 'message' => 'Record Found', 'data' => $record);
        }else{
            $res = array('status' => 'error', 'message' => 'Record Not Found', 'data' => []);
        }
        echo json_encode($res); exit;
    }

    public function showProfile($id) {
        $page_data['get_member'] = $this->db->get_where("member", array("member_id" => $id))->result();
        $this->load->view('front/chat/left_panel', $page_data);

        // $arr = array('status' => true, 'msg' => 'record found', 'data' => $data);
        // echo json_encode($arr); exit;
    }

    public function delete_chat($id) {
        $this->message->delete_chat($id);

        $arr = array('status' => true, 'msg' => 'record found', 'data' => []);
        echo json_encode($arr); exit;
    }

    public function show_msg_list() {
        return $this->load->view('front/header/messages');
    }

    public function msg_count() {
        $memberId = $this->session->member_id;
        $totalCount = '';
		if (!empty($memberId)) {
            $messageCount = $this->Crud_model->countMessage($memberId);
            if (!empty($messageCount)){
                $totalCount = $messageCount > 98 ? "99+" : $messageCount;
            }
        }

        echo $totalCount; exit();
    }
}
