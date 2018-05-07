<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/27/17
 * Time: 9:54 AM
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
                        <th>Location Name</th>
                        <th>Location Phone</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($locations as $location){
                        ?>
                        <tr>
                            <td><?php echo $location->location_name?></td>
                            <td><?php echo $location->location_phone?></td>
                            <td>
                                <a  href="<?php echo base_url('users/editLocation/'.$location->location_id)?>" class="btn btn-primary waves-effect">
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


