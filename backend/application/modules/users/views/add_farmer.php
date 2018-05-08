<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 08/05/18
 * Time: 09:44
 */?>
<div class="container" style="margin-left: -200px; margin-top: -40px">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Farmer Details</div>
        <div class="card-body">
            <?php echo $this->session->flashdata('flash'); ?>
            <?php echo form_open( base_url('users/addFarmerDetails'));?>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">First name</label>
                            <?php
                            echo form_error('fname');
                            ?>
                            <input class="form-control" name="fname" id="fname" type="text" aria-describedby="nameHelp" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">Last name</label>
                            <?php
                            echo form_error('lname');
                            ?>
                            <input class="form-control" name="lname" id="lname" type="text" aria-describedby="nameHelp" placeholder="Enter Last Name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <?php
                    echo form_error('phone');
                    ?>
                    <input class="form-control" name="phone" id="phone" type="text" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Location</label>
                    <?php
                    echo form_error('location');
                    ?>
                    <input class="form-control" name="location" id="location" type="text" placeholder="Enter Farm location">
                </div>
                <button class="btn btn-primary btn-block">Register Farmer</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

