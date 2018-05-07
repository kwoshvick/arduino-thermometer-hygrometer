<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/23/17
 * Time: 9:51 PM
 */?>
<div class="card col-md-8"  >
    <div class="body">
        <?php echo $this->session->flashdata('flash'); ?>
        <?php echo form_open('users/adduserDetails'); array('id'=>"sign_up")?>
        <?php
        echo form_error('fname');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" disabled value="<?php echo $user[0]->fname;?>" name="fname" placeholder="First Name"  autofocus>
            </div>
        </div>
        <?php
        echo form_error('lname');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" disabled value="<?php echo $user[0]->lname;?>" name="lname" placeholder="Last Name"  autofocus>
            </div>
        </div>
        <?php
        echo form_error('email');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
            <div class="form-line">
                <input type="email" disabled value="<?php echo $user[0]->email;?>" class="form-control" name="email" placeholder="Email Address" >
            </div>
        </div>
        <?php
        echo form_error('idno');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">credit_card</i>
                        </span>
            <div class="form-line">
                <input type="number" disabled value="<?php echo $user[0]->id_no;?>" class="form-control" name="idno" placeholder="ID Number">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>


