<style>
	.new-msg{
		color: white;
		background: red;
		padding: 4px;
		border-radius: 8px;
		font-size: 10px;
	}
</style>
<div class="direct-chat-contacts">
	<ul class="contacts-list border border-dark ">
		<div class="text-center mg-bg">
			<h4 class="card-inner-title card-bg fs-20">
				<i class="fa fa-users"></i> <?php echo translate('Chats Sent') ?>
			</h4>
		</div>
		<?php
		$listed_messaging_members = $this->Crud_model->get_listed_messaging_members($this->session->userdata('member_id'));
		// echo '<pre>'; print_r($messagesList); die;
		?>
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
				<a onclick="displayMessages(<?= $message_thread_id ?>,<?=$member_id ?>,'<?= $display_member ?>')" id="thread_<?= $message_thread_id ?>">
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
						<span class="contacts-list-name" data-member="<?= $member_id ?>">
							<?= $display_member ?> <span id="new_msg_<?= $message_thread_id ?>" class="new-msg d-none">New</span>
							<?php if ($isOnline != 0 && $isOnline > strtotime(date('Y-m-d H:i:s'))) { ?>
								<span class="onlineDot"></span>
							<?php } else { ?>
								<span class="offlineDot"></span>
							<?php } ?>
						</span>
					</div>
				</a>
			</li>
		<?php endforeach ?>
	</ul>
</div>

