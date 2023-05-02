<style>
/* Blue Left */
.blue-direct-chat-text-left {
    /* border-radius: 5px; */
    position: relative;
    padding: 7px 10px;
    background: #1e7ae9;
    border: 1px solid #1e7ae9;
    border-radius: 25px;
    margin: -5px 0 0 50px;
    color: #444;
    font-size: 14px;
    width: 50%;
    color: #fff!important;
}

.direct-chat-msg .blue-direct-chat-text-left:before {
    content: '';
    position: absolute;
    z-index: -2;
    bottom: 0;
    left: -8px;
    height: 20px;
    width: 20px;
    background: linear-gradient(to top,#1e7ae9 0,#1e7ae9 100%);
    background-attachment: fixed;
    border-bottom-right-radius: 15px;
    pointer-events: none;
}

.direct-chat-msg .blue-direct-chat-text-left:after {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 0;
    left: -10px;
    width: 9px;
    height: 20px;
    background: #fff;
    border-bottom-right-radius: 10px;
}

/* Blue Right */
.blue-direct-chat-text-right {
    border-radius: 5px;
    position: relative;
    padding: 7px 10px;
    background: #1e7ae9 !important;
    border: 1px solid #1e7ae9;
    border-radius: 25px;
    margin: -5px 0 0 50px;
    color: #444;
    font-size: 14px;
    width: 50%;
    margin-right: 50px;
    margin-left: 0;
    float: right;
    color: #fff;
}

.blue-direct-chat-text-right:before {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 0;
    left: inherit;
    right: -8px;
    height: 20px;
    width: 20px;
    background: linear-gradient(to bottom,#1e7ae9 0,#1e7ae9 100%);
    background-attachment: fixed;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 15px;
    pointer-events: none;
}

.blue-direct-chat-text-right:after {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 0;
    right: -10px;
    width: 9px;
    height: 20px;
    background: #fff;
    left: inherit;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 10px;
}


/* Red Right */
.red-direct-chat-text-right {
    border-radius: 5px;
    position: relative;
    padding: 7px 10px;
    background: #e91e63 !important;
    border: 1px solid #e91e63;
    border-radius: 25px;
    margin: -5px 0 0 50px;
    color: #444;
    font-size: 14px;
    width: 50%;
    margin-right: 50px;
    margin-left: 0;
    float: right;
    color: #fff;
}

.red-direct-chat-text-right:before {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 0;
    left: inherit;
    right: -8px;
    height: 20px;
    width: 20px;
    background: linear-gradient(to bottom,#e91e63 0,#e91e63 100%);
    background-attachment: fixed;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 15px;
    pointer-events: none;
}

.red-direct-chat-text-right:after {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 0;
    right: -10px;
    width: 9px;
    height: 20px;
    background: #fff;
    left: inherit;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 10px;
}

/* Red Left */
.red-direct-chat-text-left {
    /* border-radius: 5px; */
    position: relative;
    padding: 7px 10px;
    background: #e91e63;
    border: 1px solid #e91e63;
    border-radius: 25px;
    margin: -5px 0 0 50px;
    color: #444;
    font-size: 14px;
    width: 50%;
    color: #fff!important;
}

.direct-chat-msg .red-direct-chat-text-left:before {
    content: '';
    position: absolute;
    z-index: -2;
    bottom: 0;
    left: -8px;
    height: 20px;
    width: 20px;
    background: linear-gradient(to top,#e91e63 0,#e91e63 100%);
    background-attachment: fixed;
    border-bottom-right-radius: 15px;
    pointer-events: none;
}

.direct-chat-msg .red-direct-chat-text-left:after {
    content: '';
    position: absolute;
    z-index: -1;
    bottom: 0;
    left: -10px;
    width: 9px;
    height: 20px;
    background: #fff;
    border-bottom-right-radius: 10px;
}

</style>
<?php 
    $user_id = $this->session->userdata('member_id');
    $thread_info = $this->db->get_where('message_thread', array('message_thread_id' => $message_thread_id))->row();

    $info1 = $this->db->get_where('member', array('member_id' => $thread_info->message_thread_from))->row();
    $info2 = $this->db->get_where('member', array('member_id' => $thread_info->message_thread_to))->row();

    if ($info1->member_id == $user_id) {
        $from_info = $info1;
        $to_info = $info2;
    } else {
        $from_info = $info2;
        $to_info = $info1;
    }
    // print_r($to_info->member_id);exit;
    $from_image = json_decode($from_info->profile_image, true);
    $to_image = json_decode($to_info->profile_image, true);
    if ($message_count >= 50) {
    ?>
        <div class="text-center"><small><a class="c-base-1" onclick="load_all_msg(<?=$message_thread_id?>)"><?=translate('show_all_messages')?></a></small></div>
    <?php
    }


    $allMessages = json_encode($messages);

    // for ($i = 0; $i = $messages as $index=> $message) {
    for ($i=0; $i < count($messages); $i++) { ?>
        <script>
            $(document).ready(function(){
                msgTime = "<?php echo $messages[$i]->timezone_datetime; ?>";
                let index = "<?php echo $i; ?>";
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
                let dateObj = new Date(msgTime);
                let month = monthNames[dateObj.getMonth()];
                let day = String(dateObj.getDate()).padStart(2, '0');
                let year = dateObj.getFullYear();
                let timezoneDate = month  + '\n'+ day  + ', ' + year;
                timezoneTime = new Date(msgTime).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

                document.getElementById('msgTime'+index).innerHTML = timezoneTime +" "+ timezoneDate;
            });
        </script>
        <?php

        if ($messages[$i]->message_from == $user_id) { ?>
            <!-- Message. Default to the right -->
            <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-timestamp text-right pull-right" id="<?php echo "msgTime".$i; ?>"></span>
                </div>
                <?php 
                    if (file_exists('uploads/profile_image/'.$from_info->member_id.'/'.$from_info->profile_image) && $from_info->is_profile_img_approved == 1) {
                    ?>
                        <img class="direct-chat-img"  src="<?=base_url()?>uploads/profile_image/<?=$from_info->member_id."/".$from_info->profile_image?>">
                    <?php
                    }
                    else {
                    ?>
                        <img class="direct-chat-img"  src="<?=base_url()?>uploads/profile_image/default.jpg">
                    <?php
                    } 
                ?>
                <div class="<?php echo $messages[$i]->gender == 1 ? 'red-direct-chat-text-right' : 'blue-direct-chat-text-right' ?>">
                    <?=$messages[$i]->message_text?>
                </div>
            </div>
        <?php 
        }
        else {
        ?>
        
       
            <?php 
                    // if(($messages[$i]->mem1_membership != 4 || $messages[$i]->mem_membership != 4) && 
                    // ($messages[$i]->mem1_membership != 4 || $messages[$i]->mem_membership != 4)){
            ?>
            <!-- Message to the left -->
            <div class="direct-chat-msg ">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-timestamp" id="<?php echo "msgTime".$i; ?>"></span>
                </div>
                <a target="_blank" href="<?=base_url()?>home/member_profile/<?=$to_info->member_id?>">
                <?php 
                    if (file_exists('uploads/profile_image/'.$to_info->member_id.'/'.$to_info->profile_image) && $to_info->is_profile_img_approved == 1) {
                    ?>
                        <img class="direct-chat-img"  src="<?=base_url()?>uploads/profile_image/<?=$to_info->member_id."/".$to_info->profile_image?>">
                    <?php
                    }
                    else {
                    ?>
                        <img class="direct-chat-img"  src="<?=base_url()?>uploads/profile_image/default.jpg">
                    <?php
                    } 
                ?>
                </a>
                
                <div class="<?php echo $messages[$i]->gender == 1 ? 'red-direct-chat-text-left' : 'blue-direct-chat-text-left' ?>">
                     <?=$messages[$i]->message_text?>
                </div>
            </div>
            <?php
                //  } 
             ?>
        <?php
        }
    }
?>

<script>
        function sendSelectedMsg(param)
        {
            if (param != "msg_send_btn") 
            {
                // console.log(param);
                $("#msg_text").val(param)
                $("#msg_send_btn").trigger('click');
            }
        }
    $(document).ready(function(){
        // $("#msg_send_btn").attr("onclick", "msg_send(<?=$thread_info->message_thread_id?>, <?=$from_info->member_id?>, <?=$to_info->member_id?>)");
        $('#msg_body').animate({
            scrollTop: $('#msg_body').get(0).scrollHeight
        }, 1);

        var thread = "<?=$thread_info->message_thread_id?>";
        var from = "<?=$from_info->member_id?>";
        var to = "<?=$to_info->member_id?>";
        // console.log(to);

        document.getElementById('msg_send_btn').addEventListener("click", function(e){

            var form_data = $("#message_form").serialize();
            var msgField = $("#message_text").val();
            var msgField1 = $("#msg_text").val();

            const messageThreadID = localStorage.getItem('message_thread_id');
            const memberId = localStorage.getItem('memberId');
            const userId = localStorage.getItem('loginUser');

            $("#message_text").val("");
            if( $("#message_text").length )
            {
                if (msgField.trim() != false) {
                    e.preventDefault();
                    e.stopPropagation();
                    e.stopImmediatePropagation();

                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>home/send_message/" + messageThreadID + "/" + userId + "/" + memberId,
                        data: form_data,
                        success: function(response) {
                            $("#message_text").val('');
                            $("#msg_send_btn").html("<?php echo translate('send') ?>");
                            // $.ajax({
                            //         type: "POST",
                            //         url: "<?= base_url() ?>home/get_messages/" + messageThreadID,
                            //         cache: false,
                            //         success: function(response) {
                            //             $("#msg_body").html(response);
                            //         }
                            // });
                        }
                    });
                }
            }
            else
            {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>home/send_message/" + messageThreadID + "/" + userId + "/" + memberId,
                    data: form_data,
                    success: function(response) {
                        $("#message_text").val('');
                        $("#msg_send_btn").html("<?php echo translate('send') ?>");
                        // $.ajax({
                        //         type: "POST",
                        //         url: "<?= base_url() ?>home/get_messages/" + thread,
                        //         cache: false,
                        //         success: function(response) {
                        //             $("#msg_body").html(response);
                        //         }
                        // });
                    }
                });
            }

        },false)
        
        document.getElementById('message_text').addEventListener("keydown", function(e){

            var msgField = $("#message_text").val();

            if ((e.target && e.key.toLowerCase() == "enter") && (msgField.trim() != false)) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                // console.log('enter');

                document.getElementById('msg_send_btn').click();

                // $.ajax({
                //     type: "POST",
                //     url: "<?= base_url() ?>home/send_message/" + thread + "/" + from + "/" + to,
                //     data: form_data,
                //     success: function(data) {
                //         $("#message_text").val('');
                //         $("#msg_send_btn").html("<?php echo translate('send') ?>");
                //         $.ajax({
                //                 type: "POST",
                //                 url: "<?= base_url() ?>home/get_messages/" + thread,
                //                 cache: false,
                //                 success: function(response) {
                //                     $("#msg_body").html(response);
                //                 }
                //         });
                //     }
                // });
            }
        },false)
    });
</script>


