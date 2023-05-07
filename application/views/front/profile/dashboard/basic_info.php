<?php
    $basic_info = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'basic_info');
    $basic_info_data = json_decode($basic_info, true);
    $educ_and_carr_info = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'education_and_career');
    $educ_and_carr_info_data = json_decode($educ_and_carr_info, true);
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= base_url()?>template/front/css/intlTelInput.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url()?>template/front/js/intlTelInput-jquery.min.js"></script>

<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_basic_info">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <!--<?php echo translate('basic_information')?>-->
				PROFILE
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('basic_info')">
                <i class="ion-edit"></i>
				<span class="tooltiptext">Edit</span>
                </button>
            </div>
        </div>
        <div class="table-full-width">
            <div class="table-full-width">
                <table class="table table-xs table-profile table-responsive-sm table-striped table-bordered table-slick">
                    <tbody>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('first_name')?></span>
                            </td>
                            <td>
                                <?=$get_member[0]->first_name?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('last_name')?></span>
                            </td>
                            <td>
                                <?=$get_member[0]->last_name?>
                            </td>

                        </tr>
						<tr>
                            <td class="td-label">
                                <span><?php echo translate('age')?></span>
                            </td>
                            <td>
                                <?php
                                    $calculated_age = (date('Y') - date('Y', $get_member[0]->date_of_birth));
                                    echo $calculated_age;
                                ?>
                            </td>
							 <td class="td-label">
                                <span><?php echo translate('email')?></span>
                            </td>
                            <td>
                                <?=$get_member[0]->email?>
                            </td>


                        </tr>
						<tr>

							<td class="td-label">
                                <span><?php echo translate('gender')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('gender', $get_member[0]->gender)?>
                            </td>
							<td class="td-label">
                                <span>Profession</span>
                            </td>
                            <td>
                               <?=$this->Crud_model->get_type_name_by_id('profession', $basic_info_data[0]['profession'])?>
                            </td>

                        </tr>
						<tr>
							<td class="td-label">
                                <span>Date of birth</span>
                            </td>
                            <td>
                                <?=date('m/d/Y', $get_member[0]->date_of_birth)?>
                            </td>
							<td class="td-label">
                                <span>Current Location</span>
                            </td>
                            <td>
								<?=$this->Crud_model->get_type_name_by_id('country', $basic_info_data[0]['residence'])?>

                            </td>

                        </tr>
						<tr>
							<td class="td-label">
                                <span>My Sect</span>
                            </td>
                            <td>
								<?=$this->Crud_model->get_type_name_by_id('sect', $basic_info_data[0]['my_sect'])?>
                            </td>
							<td class="td-label">
                                <span>Resident Status</span>
                            </td>
                            <td>
                                 <?=$this->Crud_model->get_type_name_by_id('resident_status', $basic_info_data[0]['resident_status'])?>
                            </td>

                        </tr>
						<tr>
							<td class="td-label">
                                <span>Education</span>
                            </td>
                            <td>
								<?=$this->Crud_model->getEducationTitle('education', $educ_and_carr_info_data['highest_education']);?>
                            </td>
							<td class="td-label">
                                <span>Like To Marry</span>
                            </td>
                            <td>
								<?=$this->Crud_model->get_type_name_by_id('like_to_marry', $basic_info_data[0]['like_to_marry'])?>
                            </td>

                        </tr>
						<tr>
							<td class="td-label">
                                <span><!--<?php echo translate('mobile')?>-->Phone</span>
                            </td>
                            <td><?=$get_member[0]->mobile?></td>
							<td class="td-label">
                                <span>1st Language</span>
                            </td>
                            <td>
							<?=$this->Crud_model->get_type_name_by_id('language', $basic_info_data[0]['first_language'])?>

                            </td>

                        </tr>
						<tr>
							<td class="td-label">
                                <span><?php echo translate('marital_status')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('marital_status', $basic_info_data[0]['marital_status'])?>
                            </td>
							<td class="td-label">
                                <span>Disabilities</span>
                            </td>
                            <td>
							<?=$this->Crud_model->get_type_name_by_id('dissablities', $basic_info_data[0]['Disabilities'])?>
                            </td>

                        </tr>
						<tr>
							<td class="td-label">
                                <span>Living With</span>
                            </td>
                            <td>
							<?=$this->Crud_model->get_type_name_by_id('living_with', $basic_info_data[0]['living_with'])?>
							</td>
							<td class="td-label">
                                <span>Profile Made</span>
                            </td>
                            <td>
							<?=$this->Crud_model->get_type_name_by_id('on_behalf', $basic_info_data[0]['profile_made'])?>
                            </td>

                        </tr>
                        <tr>
							<td class="td-label">
                                <span>Ethnic Group</span>
                            </td>
                            <td>
							<?=$get_member[0]->ethnic_group?>
							</td>
                            <td class="td-label">
                                <span>my height</span>
                            </td>
                            <td>
                                <?=$get_member[0]->height?>
                            </td>
                        </tr>
                    <tr>
                        <td class="td-label">
                            <span>My Job Title</span>
                        </td>
                        <td>
                            <?=$educ_and_carr_info_data['my_job_title'];?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_basic_info" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                PROFILE
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('basic_info')"><i class="ion-checkmark"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('basic_info')"><i class="ion-close"></i></button>
            </div>
        </div>

        <div class='clearfix'></div>
        <form id="form_basic_info" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="first_name" class="text-uppercase c-gray-light"><?php echo translate('first_name')?></label>
                        <input type="text" class="form-control no-resize" name="first_name" value="<?=$get_member[0]->first_name?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="last_name" class="text-uppercase c-gray-light"><?php echo translate('last_name')?></label>
                        <input type="text" class="form-control no-resize" name="last_name" value="<?=$get_member[0]->last_name?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="age" class="text-uppercase c-gray-light">Age (Auto calculated from date of birth)</label>
                        <input disabled type="text" class="form-control no-resize" name="age" value="<?=(date('Y') - date('Y', $get_member[0]->date_of_birth))?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="email" class="text-uppercase c-gray-light"><?php echo translate('email')?></label>
                        <input type="hidden" name="old_email" value="<?=$get_member[0]->email?>">
                        <input type="email" class="form-control no-resize" name="email" value="<?=$get_member[0]->email?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
			<div class="row">
                 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="first_name" class="text-uppercase c-gray-light"><?php echo translate('gender')?></label>
                        <?php
                            echo $this->Crud_model->select_html('gender', 'gender', 'name', 'edit', 'form-control form-control-sm selectpicker', $get_member[0]->gender, '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="profession" class="text-uppercase c-gray-light">Profession</label>
						<?php
                            echo $this->Crud_model->select_html('profession', 'profession', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['profession'], '', '', '');
                        ?>

                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

            </div>
            <div class="row">
                 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="date_of_birth" class="text-uppercase c-gray-light">Born </label>
                        <input type="date" class="form-control no-resize" name="date_of_birth" value="<?=date('Y-m-d', $get_member[0]->date_of_birth)?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="residence" class="text-uppercase c-gray-light">Current Location</label>
						<?php
                        echo $this->Crud_model->select_html('country', 'residence', 'name', 'edit', 'form-control form-control-sm selectpicker present_state_edit', $basic_info_data[0]['residence'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="my_sect" class="text-uppercase c-gray-light">My Sect</label>
                         <?php
                            echo $this->Crud_model->select_html('sect', 'my_sect', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['my_sect'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="resident_status" class="text-uppercase c-gray-light">Resident Status</label>
                        <?php
                            echo $this->Crud_model->select_html('resident_status', 'resident_status', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['resident_status'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="highest_education" class="text-uppercase c-gray-light">Education</label>
                        <?php
                        echo $this->Crud_model->select_html('education', 'highest_education', 'name', 'edit', 'form-control form-control-sm selectpicker', json_decode($get_member[0]->education_and_career)->highest_education, '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="like_to_marry" class="text-uppercase c-gray-light">Like To Marry</label>
                        <?php
                            echo $this->Crud_model->select_html('like_to_marry', 'like_to_marry', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['like_to_marry'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
			 <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="mobile" class="text-uppercase c-gray-light">Phone</label>
                        <input type="hidden" name="old_mobile" value="<?=$get_member[0]->mobile?>">
                        <input type="hidden" id="utilJsPath" value="<?= base_url()?>template/front/js/utils.js">
                        <input type="text" class="form-control no-resize" id="phone_number" aria-describedby="text-feet" name="mobile" value="<?=$get_member[0]->mobile?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="first_language" class="text-uppercase c-gray-light">1st Language</label>
                        <?php
                            echo $this->Crud_model->select_html('language', 'first_language', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['first_language'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

            </div>
			<div class="row">
                 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="marital_status" class="text-uppercase c-gray-light">Marital Status</label>
                        <?php
                            echo $this->Crud_model->select_html('marital_status', 'marital_status', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['marital_status'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="Disabilities" class="text-uppercase c-gray-light">Disabilities</label>
                        <?php
                            echo $this->Crud_model->select_html('dissablities', 'Disabilities', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['Disabilities'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
			<div class="row">
                 <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="living_with" class="text-uppercase c-gray-light">Living With</label>
                        <?php
                            echo $this->Crud_model->select_html('living_with', 'living_with', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['living_with'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="profile_made" class="text-uppercase c-gray-light">Profile Made</label>
						<?php
                            echo $this->Crud_model->select_html('on_behalf', 'profile_made', 'name', 'edit', 'form-control form-control-sm selectpicker', $basic_info_data[0]['profile_made'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="profile_made" class="text-uppercase c-gray-light">Ethnic Group</label>
                        <?php
                        $selectItems = array(
                            'African','Albanian','Algerian','Amerindian','American','Andorran','Arab','Argentinian','Armenian','Australian','Azerbaijani',
                            'Bahraini','Balochi','Belarusian','Belgian','Bengali','Black African','Black Caribbean','Bosnian','British','Brazilian','Bulgarian',
                            'Caribbean','Chinese','Circassian','Colombian','Cuban','Curaciónian','Dutch','Egyptian','English','Estonian','Ethiopian','European',
                            'Filipino','French','German','Greek','Gypsy','Haitian','Hawaiian','Herzegovinian','Hispanic','Hungarian','Indian','Indonesian','Iraqi',
                            'Irish','Italian','Japanese','Jordanian','Jamaican','Kenyan','Korean','Kuwaiti','Latino','Lebanese','Lithuanian','Luxembourger',
                            'Macedonian','Maltese','Mexican','Moroccan','Montenegrin','Muhajirs','Nepali','Norwegian','Pakistani','Pashtun (Pathan)','Palestinian',
                            'Persian','Polish','Polynesian','Portuguese','Puerto Rican','Punjabi','Romanian','Russian','Samoan','Saraiki','Scandinavian','Scottish',
                            'Serbian','Sindhi','Sri Lankan','Spanish','Swiss','Syrian','Tunisian','Turkish','Ukrainian','Venezuelan','Vietnamese','Welsh','White','Other'
                        );
                        ?>
                        <select name="ethnic_group" class="form-control-sm form-control form-control-sm selectpicker select2Menu">
                            <?php foreach($selectItems as $item){?>
                            <option value="<?= $item;?>"
                            <?php
                                if($get_member[0]->ethnic_group == $item)
                                    echo ' selected';?>
                            ><?php echo $item;?></option>
                            <?php } ?>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="height" class="text-uppercase c-gray-light"><?php echo translate('height')?></label>
                        <input type="text" class="form-control no-resize height_mask" aria-describedby="text-feet" name="height" value="<?=$get_member[0]->height?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="my_job_title" class="text-uppercase c-gray-light">My Job Title</label>
                        <input type="text" class="form-control no-resize" name="my_job_title" value="<?=$educ_and_carr_info_data['my_job_title']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
            $('.select2Menu').select2({
                width: '100%'
            });
        $(".phone_mask").inputmask({
            mask: "999-999-9999",
            greedy: false,
            definitions: {
                '*': {
                    validator: "[0-9]"
                }
            }
        });
        $("#phone_number").intlTelInput();
    });
</script>