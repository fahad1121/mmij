<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getUserChatHistory($userId) {

        $str = "SELECT mt.*, CONCAT(m.`first_name`,' ', m.last_name) AS msg_from, m.is_profile_img_approved AS msg_from_img_approve, 
        m.profile_image AS msg_from_img, m.display_member AS msg_from_display_member, m.isOnline AS msg_from_online,
        CONCAT(m1.`first_name`,' ', m1.last_name) AS msg_to, m1.is_profile_img_approved AS msg_to_img_approve, m1.profile_image AS msg_to_img,
        m1.display_member AS msg_to_display_member, m1.isOnline AS msg_to_online
        FROM message_thread AS mt  
        LEFT JOIN member AS m ON mt.`message_thread_from` = m.`member_id`
        LEFT JOIN member AS m1 ON mt.`message_thread_to` = m1.`member_id`
        WHERE `message_thread_from` = $userId OR `message_thread_to` = $userId";

        return $this->db->query($str)->result();
    }

    public function getMessageThreadId($membeId, $userId)
    {
        $str = "SELECT * FROM `message_thread` WHERE message_thread_from = '$userId' AND message_thread_to = '$membeId' 
        OR message_thread_from = '$membeId' AND message_thread_to = '$userId' ";
        return $this->db->query($str)->row();
    }

    
}