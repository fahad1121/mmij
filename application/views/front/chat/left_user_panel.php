<style>
    .bg-base-blue {
    background-color: #1e7ae9!important;
    color: #fff!important;
}
.chat-del {
    width: 10px;
    height: 10px;
    position: absolute;
    top: calc(50% - 5px);
    right: 0;
    border-radius: 50%;
    color: red;
}
.delete_chat:hover .contacts-list-name {
    color: #fff;
}
</style>
<?php

$loggedInMemberId = $this->session->userdata('member_id');

$loggedUser = $this->db->get_where("member", array("member_id" => $loggedInMemberId))->row();
if($loggedUser->gender == 1) {
    $bgClass = 'sidebar sidebar-inverse sidebar--style-1 bg-base-blue z-depth-2-top';
}else {
    $bgClass = '';
}


?>
<style>.lg-outer #lg-download {display: none!important;}</style>
<?php $has_video = 0; ?>
<div class="sidebar sidebar-inverse sidebar--style-1 bg-base-1 z-depth-2-top">
    <div class="sidebar-object mb-4">
        <!-- Profile picture kar-->
        <div id="container">
            <div class="row">
            <div class="my_class" style="display:block;text-align:center;" id=""> ME</div>
<!-- Removed code from here-->
            </div>
            
            <div class="profile-picture profile-picture--style-2" id="dp">
                <?php
                if (file_exists('uploads/profile_image/'.$loggedInMemberId.'/'.$loggedUser->profile_image) && $loggedUser->is_profile_img_approved == 1) { ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 10px;">
                            <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/<?=$loggedInMemberId.'/'.$loggedUser->profile_image?>)"></div>
                        </div>
                    <?php
                } else {
                    ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 10px;">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default.JPG)"></div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <?php

$listed_messaging_members = $this->Crud_model->get_listed_messaging_members($this->session->userdata('member_id'));
            ?>

            <div style="margin-top: 20px">
                
                <a href="#" class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 l_nav dropdown dropdown-submenu nav-link" data-toggle="dropdown" aria-expanded="false" style="margin-bottom: 0px !important;">
                    <b style="font-size: 12px;">CHATS SENT</b>&nbsp;
                    <i class="fa fa-sort-down"></i></a>
                <ul class="dropdown-menu" style="border: 1px solid rgb(241, 241, 241) !important; will-change: transform; min-width: 79%">
                    <li class="dropdown dropdown-submenu">
                    </li>

                    <?php foreach ($messagesList as $listed_member) : 
			
			$display_member = '';
			$is_img_approved = 0;
			$profile_image = '';
			$member_id = 0;
			$isOnline = '';

			$message_thread_id = $listed_member->message_thread_id;
			if ($listed_member->message_thread_from == $this->session->userdata('member_id')) { 
					$display_member = $listed_member->msg_to_display_member;
					$is_img_approved = $listed_member->msg_to_img_approve;
					$profile_image = $listed_member->msg_to_img;
					$member_id = $listed_member->message_thread_to;
					$isOnline = $listed_member->msg_to_online;
			 }else {
				$display_member = $listed_member->msg_from_display_member;
				$is_img_approved = $listed_member->msg_from_img_approve;
				$profile_image = $listed_member->msg_from_img;
				$member_id = $listed_member->message_thread_from;
				$isOnline = $listed_member->msg_from_online;
			 } ?>

			<li>
                
                <a class="dropdown-item btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 gallery delete_chat" id="<?= $message_thread_id ?>" style="margin-bottom: 0px !important; border: 1px solid lightgrey;">
					<?php
					if (file_exists('uploads/profile_image/' . $member_id.'/'. $profile_image) && $is_img_approved == 1) {
					?>
						<img class="contacts-list-img" src="<?= base_url() ?>uploads/profile_image/<?= $member_id.'/'. $profile_image ?>">
					<?php
					} else {
					?>
						<img class="contacts-list-img" src="<?= base_url() ?>uploads/profile_image/default.jpg">
					<?php
					}
					?>
					<div class="contacts-list-info">
						<span class="contacts-list-name text-left" data-member="<?= $member_id ?>">
							<?= $display_member ?>
                                <i class="fa fa-trash chat-del"></i>
						</span>
					</div>
				</a>

                
			</li>
		<?php endforeach ?>
                    

                </ul>
                <p class="text-center" style="color: #fff">All chats are deleted after 10 days</p>
                </div>
        </div>        
    </div>
</div>

