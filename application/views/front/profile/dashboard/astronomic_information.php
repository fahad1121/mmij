<?php
$astronomic_information = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'astronomic_information');
$astronomic_information_data = json_decode($astronomic_information, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_astronomic_information">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                RELIGION
            </h3>
            <div class="pull-right">

                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1 " onclick="edit_section('astronomic_information')">
                    <i class="ion-edit"></i>
                    <span class="tooltiptext">Edit</span>
                </button>

            </div>
        </div>
        <div class="table-full-width">
            <div class="table-full-width">
                <table class="table table-xs table-profile table-striped table-bordered table-responsive-sm">
                    <tbody>
                    <tr>
                        <td class="td-label">
                            Religious Practice
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('muslim_i_am', $astronomic_information_data[0]['muslim_i_am'])?>

                        </td>
                        <td class="td-label">
                            <span>I am a Revert</span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('yes_no', $astronomic_information_data[0]['revert'])?>

                        </td>
                        <td class="td-label">
                            <span>I am a Convert</span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('yes_no', $astronomic_information_data[0]['convert'])?>

                        </td>
                    </tr>
                    <tr>
                        <td class="td-label">
                            <span>Do I Keep Fast</span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('yes_no', $astronomic_information_data[0]['do_i_fast'])?>

                        </td>
                        <td class="td-label">
                            <span>Do I Pray</span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('yes_no', $astronomic_information_data[0]['do_i_pray'])?>

                        </td>
                        <td class="td-label">
                            <span>Halal Diet</span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('yes_no', $astronomic_information_data[0]['do_i_eat_halal'])?>

                        </td>
                    </tr>
                    <tr>
                        <td class="td-label">
                            <span>WOMEN(I WEAR)</span>
                        </td>
                        <td>
                            <!--							--><?//=$this->Crud_model->get_type_name_by_id('yes_no', $astronomic_information_data[0]['women_only'])?>
                            <?php
                            if($astronomic_information_data[0]['women_only'] == 1){
                                echo 'Hijab';
                            }
                            elseif($astronomic_information_data[0]['women_only'] == 2){
                                echo 'Jilbab';
                            }
                            elseif($astronomic_information_data[0]['women_only'] == 3){
                                echo 'Abiya';
                            }
                            elseif($astronomic_information_data[0]['women_only'] == 4){
                                echo 'Niqab';
                            }
                            elseif($astronomic_information_data[0]['women_only'] == 5){
                                echo 'Gloves';
                            }
                            elseif($astronomic_information_data[0]['women_only'] == 6){
                                echo 'No Religious Dress';
                            }
                            ?>

                        </td>
                        <td class="td-label">
                            <span>MEN(I WEAR)</span>
                        </td>
                        <td>
                            <!--							--><?//=$this->Crud_model->get_type_name_by_id('wife_wear', $astronomic_information_data[0]['wife_wear'])?>
                            <?php
                            if($astronomic_information_data[0]['wife_wear'] == 1){
                                echo 'Beard';
                            }
                            elseif($astronomic_information_data[0]['wife_wear'] == 2){
                                echo 'No Beard';
                            }
                            elseif($astronomic_information_data[0]['wife_wear'] == 3){
                                echo 'Muslim Hat';
                            }
                            elseif($astronomic_information_data[0]['wife_wear'] == 4){
                                echo 'Muslim Juba';
                            }
                            elseif($astronomic_information_data[0]['wife_wear'] == 5){
                                echo 'No Religious Dress';
                            }
                            ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_astronomic_information" style="display: none;">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                RELIGION
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('astronomic_information')"><i class="ion-checkmark"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('astronomic_information')"><i class="ion-close"></i></button>
            </div>
        </div>

        <div class='clearfix'></div>
        <form id="form_astronomic_information" class="form-default" role="form">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="muslim_i_am" class="text-uppercase c-gray-light">Religious Practice</label>
                        <?php
                        echo $this->Crud_model->select_html('muslim_i_am', 'muslim_i_am', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['muslim_i_am'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="revert" class="text-uppercase c-gray-light">I am a Revert</label>
                        <?php
                        echo $this->Crud_model->select_html('yes_no', 'revert', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['revert'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="convert" class="text-uppercase c-gray-light">I am a Convert</label>
                        <?php
                        echo $this->Crud_model->select_html('yes_no', 'convert', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['convert'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="do_i_fast" class="text-uppercase c-gray-light">Do I Keep Fast?</label>
                        <?php
                        echo $this->Crud_model->select_html('yes_no', 'do_i_fast', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['do_i_fast'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="do_i_pray" class="text-uppercase c-gray-light">Do I Pray?</label>
                        <?php
                        echo $this->Crud_model->select_html('yes_no', 'do_i_pray', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['do_i_pray'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="do_i_eat_halal" class="text-uppercase c-gray-light">Halal Diet</label>
                        <?php
                        echo $this->Crud_model->select_html('yes_no', 'do_i_eat_halal', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['do_i_eat_halal'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="women_only" class="text-uppercase c-gray-light">WOMEN (I WEAR)</label>
                        <?php
                        // echo $this->Crud_model->select_html('yes_no', 'women_only', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['women_only'], '', '', '');
                        ?>
                        <select name="women_only" class="form-control">
                            <option >Select Item</option>
                            <option value="1" <?= ($astronomic_information_data[0]['women_only'] == 1) ? 'selected' : ''?>>Hijab</option>
                            <option value="2" <?= ($astronomic_information_data[0]['women_only'] == 2) ? 'selected' : ''?>>Jilbab</option>
                            <option value="3" <?= ($astronomic_information_data[0]['women_only'] == 3) ? 'selected' : ''?>>Abiya</option>
                            <option value="4" <?= ($astronomic_information_data[0]['women_only'] == 4) ? 'selected' : ''?>>Niqab</option>
                            <option value="5" <?= ($astronomic_information_data[0]['women_only'] == 5) ? 'selected' : ''?>>Gloves</option>
                            <option value="6" <?= ($astronomic_information_data[0]['women_only'] == 6) ? 'selected' : ''?>>No Religious Dress</option>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <label for="wife_wear" class="text-uppercase c-gray-light"> Men (I WEAR)</label>
                        <?php
                        //echo $this->Crud_model->select_html('wife_wear', 'wife_wear', 'name', 'edit', 'form-control form-control-sm selectpicker', $astronomic_information_data[0]['wife_wear'], '', '', '');
                        ?>
                        <select name="wife_wear" class="form-control">
                            <option>Select Item</option>
                            <option value="1" <?= ($astronomic_information_data[0]['wife_wear'] == 1) ? 'selected' : ''?>>Beard</option>
                            <option value="2" <?= ($astronomic_information_data[0]['wife_wear'] == 2) ? 'selected' : ''?>>No Beard</option>
                            <option value="3" <?= ($astronomic_information_data[0]['wife_wear'] == 3) ? 'selected' : ''?>>Muslim Hat</option>
                            <option value="4" <?= ($astronomic_information_data[0]['wife_wear'] == 4) ? 'selected' : ''?>>Muslim Juba</option>
                            <option value="5" <?= ($astronomic_information_data[0]['wife_wear'] == 5) ? 'selected' : ''?>>No Religious Dress</option>
                        </select>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>