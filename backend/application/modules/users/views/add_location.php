<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/27/17
 * Time: 9:54 AM
 */?>
<div class="card col-md-6 m-t-10 ">
    <div class="body">
        <?php echo $this->session->flashdata('flash'); ?>
        <?php echo form_open('users/addNewLocation');
        array('id' => "sign_up") ?>
        <?php
        echo form_error('location');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">place</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" name="location" placeholder="Location Name" autofocus required>
            </div>
        </div>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" name="phone" placeholder="Phone" autofocus required>
            </div>
        </div>

        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Add Location</button>
        <?php echo form_close(); ?>
    </div>
</div>
