<section class="slice sct-color-2">
	<div class="profile">
		<div class="container">
			<?php
			$membership = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata('member_id'), 'membership');
			if ($membership == 1) {
			?>
				<div class="row">
					<div class="col-md-10 col-xs-12">
						<div class="alert alert-danger w-93" role="alert">
							Subscribe to our <a onclick="routeToPackages()" class="text-red">Platinum plan</a> to freely message others
						</div>
					</diV>
				</div>
			<?php } ?>
			<div class="row">
				<!-- Alerts for Member actions -->
				<div class="col-lg-3 col-md-4" id="success_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
					<div class="alert alert-success fade show" role="alert">
						<!-- Success Alert Content -->
						<!-- You have <b>Successfully</b> Edited your Profile! -->
					</div>
				</div>
				<div class="col-lg-3 col-md-4" id="danger_alert" style="display: none; position: fixed; top: 15px; right: 0; z-index: 9999">
					<div class="alert alert-danger fade show" role="alert">
						<!-- Success Alert Content -->
						<!-- You have <b>Successfully</b> Edited your Profile! -->
					</div>
				</div>
				<!-- Alerts for Member actions -->
				<?php
				// Leading Json data
				$basic_info = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'basic_info');
				$basic_info_data = json_decode($basic_info, true);

				$present_address = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'present_address');
				$present_address_data = json_decode($present_address, true);

				$education_and_career = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'education_and_career');
				$education_and_career_data = json_decode($education_and_career, true);

				$physical_attributes = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'physical_attributes');
				$physical_attributes_data = json_decode($physical_attributes, true);

				$language = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'language');
				$language_data = json_decode($language, true);

				$hobbies_and_interest = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'hobbies_and_interest');
				$hobbies_and_interest_data = json_decode($hobbies_and_interest, true);

				$personal_attitude_and_behavior = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'personal_attitude_and_behavior');
				$personal_attitude_and_behavior_data = json_decode($personal_attitude_and_behavior, true);

				$residency_information = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'residency_information');
				$residency_information_data = json_decode($residency_information, true);

				$spiritual_and_social_background = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'spiritual_and_social_background');
				$spiritual_and_social_background_data = json_decode($spiritual_and_social_background, true);

				$life_style = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'life_style');
				$life_style_data = json_decode($life_style, true);

				$astronomic_information = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'astronomic_information');
				$astronomic_information_data = json_decode($astronomic_information, true);

				$permanent_address = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'permanent_address');
				$permanent_address_data = json_decode($permanent_address, true);

				$family_info = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'family_info');
				$family_info_data = json_decode($family_info, true);

				$additional_personal_details = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'additional_personal_details');
				$additional_personal_details_data = json_decode($additional_personal_details, true);

				$partner_expectation = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'partner_expectation');
				$partner_expectation_data = json_decode($partner_expectation, true);

				$privacy_status = $this->Crud_model->get_type_name_by_id('member', $get_member[0]->member_id, 'privacy_status');
				$privacy_status_data = json_decode($privacy_status, true);
				?>
				<div class="col-lg-4">
					<div id="mysidebar">
						<?php include_once APPPATH . 'views/front/chat/left_panel.php'; ?>
					</div>
					
					
					<div id="messaging_member_list" class="pb-3">
					<?php include_once APPPATH . 'views/front/profile/messaging/member_list.php'; ?>
				</div>
				</div>
				<div class="col-lg-8">
					<?php include_once APPPATH . 'views/front/profile/messaging/index.php'; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function open_message_box(thread_id, now, displaynumber) {

		$("#msg_body").html("<div class='text-center' id='payment_loader'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
		$("#msg_box_header").html("<a class='c-base-1' target='_blank' href='<?= base_url() ?>home/member_profile/" + $(now).find('.contacts-list-name').data('member') + "'>" + displaynumber + "</a> CHAT ROOM");
		//  $("#msg_refresh").html("<a onclick='refresh_msg(" + thread_id + ")'><i class='fa fa-refresh'></i> <?= translate('refresh') ?></a>");
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>home/get_messages/" + thread_id,
			cache: false,
			success: function(response) {
				$("#msg_body").removeAttr("style");
				$("#message_text").removeAttr('disabled');
				$("#message_text").val('');
				$("#msg_body").html(response);
				//   $('.ChatterBoxWrap').addClass('opened');
			}
		});
	}

	function displayMessages(thread_id, mememberId = '', displaynumber = '') {

		$("#new_msg_" + thread_id).addClass('d-none');
		// $("#msg_body").html("<div class='text-center' id='payment_loader'><i class='fa fa-refresh fa-5x fa-spin'></i></div>");
		$("#msg_box_header").html("<a class='c-base-1' target='_blank' href='<?= base_url() ?>home/member_profile/" + mememberId + "'>" + displaynumber + "</a> CHAT ROOM");

		if (mememberId != '') {
			getUserProfile(mememberId);
			getMessageThreadId(mememberId, 'localstore')
		}
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>home/get_messages/" + thread_id,
			cache: false,
			success: function(response) {
				$("#msg_body").removeAttr("style");
				$("#message_text").removeAttr('disabled');
				$("#message_text").val('');
				$("#msg_body").html(response);
			}
		});
	}

	function getMessageThreadId(memberId, optionMsg = 'load') {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>Messaging/getThreadId/" + memberId,
			cache: false,
			success: function(res) {
				var result = JSON.parse(res);
				var loginUser = '<?= $this->session->userdata('member_id') ?>';
				if (result['status'] == 'success' && optionMsg == 'load') {
					displayMessages(result['data'].message_thread_id);
				}
				localStorage.setItem('message_thread_id', result['data'].message_thread_id);
				localStorage.setItem('memberId', memberId);
				localStorage.setItem('loginUser', loginUser);
			}
		});
	}

	function getUserProfile(mememberId) {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>messaging/showProfile/" + mememberId,
			cache: false,
			success: function(response) {
				$("#mysidebar").html(response);
			}
		});
	}
</script>


<script src='<?= base_url() ?>template/front/js/inputEmoji.js'></script>

<script>
	$(document).ready(function() {
		$('#message_text').emoji({
			place: 'after'
		});

		var pathname = window.location.pathname;
		var segments = pathname.split('/')
		getMessageThreadId(segments[3], 'load')
	});

	function routeToPackages() {
		window.location.href = "<?= base_url() ?>home/profile/platinumPlan";
	}
</script>
<script type="text/javascript">
	// // Enable pusher logging - don't include this in production
	// Pusher.log = function(message) {
	// 	if (window.console && window.console.log) {
	// 		window.console.log(message);
	// 	}
	// };
	var pusher = new Pusher('00b22f254eb6bba94512');
	var channel = pusher.subscribe('message_channel');
	channel.bind('my_event', function(data) {
		// console.log('data.thread_id', data.thread_id)
		displayMessages(data.thread_id);
		$("#new_msg_" + data.thread_id).removeClass('d-none');
	});

	$(".delete_chat").on('click', function() {
		if (confirm('Are you sure you want to delete')) {
			var id = this.id;
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>messaging/delete_chat/" + id,
				cache: false,
				success: function(response) {
					var res = JSON.parse(response);
					if (res['status']) {
						window.location.reload();
					}
				}
			});
		}

	})
</script>