<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/21/17
 * Time: 1:53 PM
 */?>
<?php echo $this->session->flashdata('flash'); ?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Users
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>ID No</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($users as $user){
                    ?>
                        <tr>
                            <td><?php echo $user->fname?></td>
                            <td><?php echo $user->lname?></td>
                            <td><?php echo $user->id_no?></td>
                            <td><?php echo $user->email?></td>
                            <td><?php echo $user->location_name?></td>
                            <td>
                                <a  href="<?php echo base_url('users/activate/'.$user->admin_id)?>" class="btn bg-deep-purple waves-effect">
                                    <?php
                                    if($user->is_active == 0){
                                        echo 'Activate';
                                    }else{
                                        echo 'Deactivate';
                                    }
                                    ?>
                                    <i class="material-icons">verified_user</i>
                                </a>
                                <a  href="<?php echo base_url('users/editUserDetails/'.$user->admin_id)?>" class="btn btn-primary waves-effect">
                                    <i class="material-icons">edit</i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
