<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/23/17
 * Time: 10:17 PM
 */?>

<div class="card col-md-6 m-t-10 l-l-120"  >
    <div class="body">
        <?php echo $this->session->flashdata('flash'); ?>
        <?php echo form_open('users/updatePassword'); array('id'=>"sign_up")?>

        <?php
        echo form_error('current_password');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
            <div class="form-line">
                <input type="password" class="form-control" name="current_password"  placeholder="Current Password" >
            </div>
        </div>

        <?php
        echo form_error('password');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
            <div class="form-line">
                <input type="password" class="form-control" name="password" minlength="6" placeholder="New Password" >
            </div>
        </div>
        <?php
        echo form_error('confirm_password');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
            <div class="form-line">
                <input type="password" class="form-control" name="confirm_password" minlength="6" placeholder="Confirm New Password" required>
            </div>
        </div>

        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">CHANGE PASSWORD</button>
        <?php echo form_close(); ?>
    </div>
</div>

