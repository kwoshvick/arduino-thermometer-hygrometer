<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 08/05/18
 * Time: 09:45
 */?>

<div class="container-fluid">
    <?php echo $this->session->flashdata('flash'); ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach ($farmers as $farmer) {
                        ?>
                        <tr>
                            <td><?php echo $farmer->fname?></td>
                            <td><?php echo $farmer->lname?></td>
                            <td><?php echo $farmer->phone?></td>
                            <td><?php echo $farmer->location?></td>
                            <td>
                                <a href="<?php echo base_url('users/editFarmerDetails/'.$farmer->farmer_id)?>"
                                   class="btn btn-primary">
                                    Edit
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


