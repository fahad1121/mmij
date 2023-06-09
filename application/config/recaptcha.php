<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Recaptcha configuration settings
 * 
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 * 
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 * 
 * @author Damar Riyadi <damar@tahutek.net>
 */

$CI=& get_instance();
$CI->load->database();

// $config['recaptcha_sitekey'] = $CI->db->get_where('third_party_settings',array('type'=>'captcha_public'))->row()->value;
// $config['recaptcha_secretkey'] = $CI->db->get_where('third_party_settings',array('type'=>'captcha_private'))->row()->value;

$config['recaptcha_sitekey'] = "6LfKOL4lAAAAAIfzuVeNQJtWv-32fFj_nbiVXBfb";
$config['recaptcha_secretkey'] = "6LfKOL4lAAAAAHIZT17JbpWrd2-pgPZGuB4TyD5-";
$config['lang'] = "en";