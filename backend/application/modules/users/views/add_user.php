<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/21/17
 * Time: 12:40 PM
 */ ?>

<div class="card col-md-6 m-t-10 m-l-120">
    <div class="body">
        <?php echo $this->session->flashdata('flash'); ?>
        <?php echo form_open('users/adduserDetails');
        array('id' => "sign_up") ?>
        <?php
        echo form_error('fname');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
            <div class="form-line">
                <input type="text" class="form-control" name="fname" placeholder="First Name" autofocus required>
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
                <input type="text" class="form-control" required name="lname" placeholder="Last Name" autofocus>
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
                <input type="email" required class="form-control" name="email" placeholder="Email Address">
            </div>
        </div>

        <div class="input-group">
            <select required name="role" class="form-control show-tick">
                <?php
                foreach ($roles as $row) {
                    ?>
                    <option value="<?php echo $row->admin_role_id; ?>"><?php echo $row->role; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>


        <?php
        echo form_error('idno');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">credit_card</i>
                        </span>
            <div class="form-line">
                <input required type="number" class="form-control" name="idno" placeholder="ID Number">
            </div>
        </div>

        <div class="input-group">
            <select required name="location" class="form-control show-tick">
                <?php
                foreach ($locations as $row) {
                    ?>
                    <option value="<?php echo $row->location_id; ?>"><?php echo $row->location_name; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <?php
        echo form_error('password');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
            <div class="form-line">
                <input required  type="password" class="form-control" name="password" minlength="6" placeholder="Password">
            </div>
        </div>
        <?php
        echo form_error('confirm');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
            <div class="form-line">
                <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password"
                       required>
            </div>
        </div>


        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>
        <?php echo form_close(); ?>
    </div>
</div>

