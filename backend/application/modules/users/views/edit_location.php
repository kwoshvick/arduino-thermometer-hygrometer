<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 24/11/17
 * Time: 15:16
 */?>
<div class="card col-md-6 m-t-10 ">
    <div class="body">
        <?php echo $this->session->flashdata('flash'); ?>
        <?php echo form_open('users/updateLocation/'.$location[0]->location_id);
        array('id' => "sign_up") ?>
        <?php
        echo form_error('location');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">place</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" value="<?php  echo $location[0]->location_name?>" name="location" placeholder="Location Name" autofocus required>
            </div>
        </div>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" value="<?php  echo $location[0]->location_phone?>" name="phone" placeholder="Phone" autofocus required>
            </div>
        </div>

        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Update Location</button>
        <?php echo form_close(); ?>
    </div>
</div>


