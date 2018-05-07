<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 24/11/17
 * Time: 16:21
 */?>

<div class="card col-md-6 m-t-10 m-l-120">
    <div class="body">
        <?php echo $this->session->flashdata('flash'); ?>
        <?php echo form_open('users/updateUserDetails/'.$user_details[0]->admin_id);
        array('id' => "sign_up") ?>
        <?php
        echo form_error('fname');
        ?>
        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
            <div class="form-line">
                <input type="text" value="<?php echo $user_details[0]->fname?>" class="form-control" name="fname" placeholder="First Name" autofocus required>
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
                <input type="text" value="<?php echo $user_details[0]->lname?>" class="form-control" required name="lname" placeholder="Last Name" autofocus>
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
                <input type="email" value="<?php echo $user_details[0]->email?>" required class="form-control" name="email" placeholder="Email Address">
            </div>
        </div>

        <div class="input-group">
            <select required name="role" class="form-control show-tick">
                <option value="<?php echo $user_details[0]->admin_role_id ?>"><?php echo $user_details[0]->role;?></option>
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
                <input required value="<?php echo $user_details[0]->id_no?>" type="number" class="form-control" name="idno" placeholder="ID Number">
            </div>
        </div>

        <div class="input-group">
            <select required name="location" class="form-control show-tick">
                <option value="<?php echo $user_details[0]->location_id ?>"><?php echo $user_details[0]->location_name;?></option>

                <?php
                foreach ($locations as $row) {
                    ?>
                    <option value="<?php echo $row->location_id; ?>"><?php echo $row->location_name; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Update</button>
        <?php echo form_close(); ?>
    </div>
</div>


