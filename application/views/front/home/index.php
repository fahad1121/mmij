<style>
    .find-special-someone {
        height: 148px;
        width: 133px;
        margin: 0 auto;
        display: block;
        position: relative;
        -webkit-transition: all .5s ease-in-out 0s;
        -moz-transition: all .5s ease-in-out 0s;
        transition: all .5s ease-in-out 0s;
    }
    
    .find-special-someone--registration {
        background: url(<?php echo base_url("/uploads/profile-steps-icon.png");?>) no-repeat left 1px;
        background-size: 100%;
    }
    
    .find-special-someone--connect {
        background: url(<?php echo base_url("/uploads/profile-steps-icon.png");?>) no-repeat left -292px;
        background-size: 100%;
    }
    
    .find-special-someone--interact {
        background: url(<?php echo base_url("/uploads/profile-steps-icon.png");?>) no-repeat left -591px;
        background-size: 100%;
    }
    
    /*.find-special-someone--registration:hover {*/
    /*    background: url(<?php echo base_url("/uploads/profile-steps-icon.png");?>) no-repeat left -147px;*/
    /*    background-size: 100%;*/
    /*}*/
    
    .find-special-details {
        margin: 20px 0 50px;
        line-height: 1.3em;
        font-family: Roboto,sans-serif;
        color: #72727d;
    }
    
    .find-special-details a {
        font-size: 24px;
        font-weight: 400;
        color: #e91e63;
    }
    
    
    .fill_registration_form {
        position: absolute;
        top: 0;
        left: 0;
        height: 148px;
        width: 133px;
        background: url(<?php echo base_url("/uploads/profile-steps-icon.png");?>) no-repeat left -147px;
        opacity: 0;
        background-size: 100%;
        -webkit-transition: all .5s ease-in-out 0s;
        -moz-transition: all .5s ease-in-out 0s;
        transition: all .5s ease-in-out 0s;
    }
    
    @media (min-width: 768px) {
        
        .find-special-details {
            margin: 53px 0 72px;
            line-height: 1.6em;
        }   
    }
    
    
</style>
<section class="sct-color-1">
    <div class="container-fluid no-padding">
        <div class="row row-no-padding">
            <?php $slider_status = $this->db->get_where('frontend_settings', array('type' => 'slider_status'))->row()->value;
            $home_members_status = $this->db->get_where('frontend_settings', array('type' => 'home_members_status'))->row()->value;
            $home_parallax_status = $this->db->get_where('frontend_settings', array('type' => 'home_parallax_status'))->row()->value;
            $home_stories_status = $this->db->get_where('frontend_settings', array('type' => 'home_stories_status'))->row()->value;
            $home_plans_status = $this->db->get_where('frontend_settings', array('type' => 'home_plans_status'))->row()->value;
            $home_contact_status = $this->db->get_where('frontend_settings', array('type' => 'home_contact_status'))->row()->value;
            $slider_position = $this->db->get_where('frontend_settings', array('type' => 'slider_position'))->row()->value;
            if($slider_status=='yes'){
                $home_search_style = $this->db->get_where('frontend_settings', array('type' => 'home_search_style'))->row()->value;
                if ($home_search_style == '2') {
                    if($slider_position=='left'){
                        include_once 'slider_2.php';
                        include_once 'search.php';
                    } elseif($slider_position=='right'){
                        include_once 'search.php';
                        include_once 'slider_2.php';
                    }
                } elseif ($home_search_style == '1') {
                    include_once 'slider.php';
                }
            }
            ?>
        </div>
    </div>
</section>

<section class="slice sct-color-1" style="padding-bottom: 0rem !important;padding-top:  0.5rem !important; margin-top: 1rem;display:none;">
    <div class="container">
        <div class="section-title section-title--style-1 text-center" style="margin-bottom: 0rem !important;">
            <h3 class="section-title-inner">
                <span><b>Find Your Special Someone</b></span>
            </h3>
        </div>
        
        <div class="row">
            <div class="col-md-4 text-center"> 
                <a href="/home/registration" class="find-special-someone find-special-someone--registration">
                    <span class="fill_registration_form"></span>
                </a>
                
                <div class="find-special-details">
                    <a href="">Sign up</a>    
                    <div>Register for free & put up your Matrimony Profile</div>
                </div>
            </div>
            
            <div class="col-md-4 text-center">
                <a href="/home/registration" class="find-special-someone find-special-someone--connect">
                    <span class="connect_with_others"></span>
                </a>
                
                <div class="find-special-details">
                    <a href="">Connect</a>    
                    <div>Select & Connect with Matches you like</div>
                </div>
            </div>
            
            <div class="col-md-4 text-center">
                <a href="/home/registration" class="find-special-someone find-special-someone--interact">
                    <span class="interatct_with_others"></span>
                </a>
                
                <div class="find-special-details">
                    <a href="">Interact</a>    
                    <div>Become a Premium Member & Start a Conversation</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    if($home_members_status=='yes'){
        include_once'premium_members.php';
    }?>
	<!--<hr style=" margin-top: 0rem !important;    margin-bottom: 0rem !important;    border-top: 2px solid #db4c7f;"  >-->
<?php
    if($home_parallax_status=='yes'){
        include_once'parallax.php';
    }?>

	<?php
  /*  if($home_stories_status=='yes'){
        include_once'happy_stories.php';
    }*/?>

	<?php
    if($home_plans_status=='yes'){
        include_once'packages.php';
    }?>

	<?php
    if($home_contact_status=='yes'){
        include_once'contact.php';
    }?>

<!-- advertisement start -->
								<div style="padding-left: 10%; padding-right: 10%;" class="bg-base-2">
								<div style="text-align: center;" class="py-3">
								   <b style="font-size: 1rem;">ADVERTISEMENTS</b>
								</div>
                                    <div class="row cols-xs-space cols-sm-space cols-md-space pb-3">                                   										
                                        <div class="col-md-2 col-lg-2  col-sm-6 col-6" style="text-align: left;line-height: 1;padding-left: 5px !important;padding-right: 5px !important;">
                                            <div class="col" style="padding-left: 2px !important;padding-right: 2px !important;">
												<h4 class="heading heading-xs strong-600 text-uppercase mb-1" style="color: #fff;">ZAYQA RESTAURANT</h4>
												<small style="line-height: 0.5rem;">29208, Orchard Lake Road<br/>Farmington Hills, Mi 48334<br/>(248) 851-5557</small>											
                                            </div>
                                        </div>                                         
                                        <div class="col-md-2 col-lg-2  col-sm-6 col-6" style="text-align: left;line-height: 1;padding-left: 5px !important;padding-right: 5px !important;">
                                            <div class="col" style="padding-left: 2px !important;padding-right: 2px !important;">
                                                <h4 class="heading heading-xs strong-600 text-uppercase mb-1" style="color: #fff;">RABIA CLOTHES</h4>
												<small style="line-height: 0.5rem;">45270, Sedra Ct.<br/>Novi,Mi 48375<br/>(248) 435-8323</small>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-2  col-sm-6 col-6" style="text-align: left;line-height: 1;padding-left: 5px !important;padding-right: 5px !important;">
                                            <div class="col" style="padding-left: 2px !important;padding-right: 2px !important;">
                                                <h4 class="heading heading-xs strong-600 text-uppercase mb-1" style="color: #fff;">UZMAS COLLECTION</h4>
												<small style="line-height: 0.5rem;">Clothes & Jewellery 3718<br/>Rochester Rd, Troy, MI 48083<br/>(248) 835-4864</small>
                                            </div>
                                        </div>
										<div class="col-md-2 col-lg-2  col-sm-6 col-6" style="text-align: left;line-height: 1;padding-left: 5px !important;padding-right: 5px !important;">
                                            <div class="col" style="padding-left: 2px !important;padding-right: 2px !important;">
												<h4 class="heading heading-xs strong-600 text-uppercase mb-1" style="color: #fff;">RAHATS CLOTHES</h4>
												<small style="line-height: 0.5rem;">49379 E. Central Park<br/>Shelby Twp, MI 48317<br/>(248) 219-3513</small>
                                            </div>
                                        </div> 
										<div class="col-md-2 col-lg-2  col-sm-6 col-6" style="text-align: left;line-height: 1;padding-left: 5px !important;padding-right: 5px !important;">
                                            <div class="col" style="padding-left: 2px !important;padding-right: 2px !important;">
												<h4 class="heading heading-xs strong-600 text-uppercase mb-1" style="color: #fff;">MERCY HOME HEALTH CARE</h4>
												<small style="line-height: 0.5rem;">1000 John R Road<br/>Ste # 206, Troy, MI 48083<br/>(248) 219-3513</small>
                                            </div>
                                        </div>    
										<div class="col-md-2 col-lg-2  col-sm-6 col-6" style="text-align: left;line-height: 1;padding-left: 5px !important;padding-right: 5px !important;">
                                            <div class="col" style="padding-left: 2px !important;padding-right: 2px !important;">
												<h4 class="heading heading-xs strong-600 text-uppercase mb-1" style="color: #fff;">OSTO & ASSOCIATED, INC</h4>
												<small style="line-height: 0.5rem;">3568 Nesting Ridge<br/>Rochester Hills, MI 48309<br/>(248) 219-3513</small>
                                            </div>
                                        </div>                                      
                                    </div>
                                </div>
<!-- advertisement end -->
<script src="<?=base_url()?>template/front/js/jquery.inputmask.bundle.min.js"></script>
<script>
    $(document).ready(function(){
    $(".height_mask").inputmask({
            mask: "9'99\"",
            greedy: false,
            definitions: {
                '*': {
                    validator: "[0-9]"
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#aged_from").change(function(){
            var from = parseInt($("#aged_from").val());
            var to = parseInt($("#aged_to").val());
            if (to < from) {
                var to = $("#aged_to").val(from);
            }
        });
        $("#aged_to").change(function(){
            var from = parseInt($("#aged_from").val());
            var to = parseInt($("#aged_to").val());
            if (to < from) {
                var to = $("#aged_to").val(from);
            }
        });
    });

     $(".s_religion").change(function(){
        var religion_id = $(".s_religion").val();
        if (religion_id == "") {
            $(".s_caste").html("<option value=''><?php echo translate('choose_a_religion_first')?></option>");
            $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_caste/caste/religion_id/"+religion_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".s_caste").html(data);
                    $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });

    $(".s_caste").change(function(){
        var caste_id = $(".s_caste").val();
        if (caste_id == "") {
            $(".s_sub_caste").html("<option value=''><?php echo translate('choose_a_caste_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id_sub_caste/sub_caste/caste_id/"+caste_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function (data) {
                    if(data == false ){
                        $(".s_sub_caste").html("<option value=''><?php echo translate('none')?></option>");
                    } else {
                        $(".s_sub_caste").html(data);
                    };
               },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
</script>
