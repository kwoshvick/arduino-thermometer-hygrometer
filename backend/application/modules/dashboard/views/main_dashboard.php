<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 10/23/17
 * Time: 7:47 PM
 */ ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<script src="<?php echo base_url('assets/morris/morris.js')?>"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
<script src="<?php echo base_url('assets/morris/examples/lib/example.js')?>"></script>
<!--<link rel="stylesheet" href="--><?php //echo base_url('assets/morris/examples/lib/example.css')?><!--">-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/morris/morris.css')?>">

<div class="container-fluid">
    <?php echo $this->session->flashdata('flash'); ?>
    <!-- Widgets -->
    <div class="row clearfix">
        <a href="<?php echo base_url('order/newOrder')?>">
            <div  class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div href="me.php" class="info-box bg-blue hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">description</i>
                    </div>
                    <div class="content">
                        <div class="text">New Order</div>
                    </div>
                </div>
            </div>
        </a>
        <a href="<?php echo base_url('order/unpaidOrder')?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">payment</i>
                </div>
                <div class="content">
                    <div class="text">
                        Unpaid Orders
                    </div>
                    <div class="number count-to" data-from="0" data-to="<?php?>" data-speed="15"
                         data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        </a>
        <a href="<?php echo base_url('')?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">Incomplete Orders</div>
                    <div class="number count-to" data-from="0" data-to="<?php ?>" data-speed="1000"
                         data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        </a>
        <a href="<?php echo base_url('order/paidOrder')?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Paid Orders</div>
                    <div class="number count-to" data-from="0" data-to="<?php ?>" data-speed="1000"
                         data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        </a>
        <a href="<?php echo base_url('order/receiveItem')?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">call_received</i>
                </div>
                <div class="content">
                    <div class="text">Receive Item</div>
                    <div class="number count-to" data-from="0" data-to="<?php ?>" data-speed="1000"
                         data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        </a>
        <a href="<?php echo base_url('order/releaseItem')?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-grey hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">call_made</i>
                </div>
                <div class="content">
                    <div class="text">Release Item</div>
                    <div class="number count-to" data-from="0" data-to="<?php ?>" data-speed="1000"
                         data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        </a>
        <a href="<?php echo base_url('order/dispatchedOrderList')?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-purple hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">call_received</i>
                </div>
                <div class="content">
                    <div class="text">Dispatched Item</div>
                    <div class="number count-to" data-from="0" data-to="<?php ?>" data-speed="1000"
                         data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        </a>
    </div>


    <!-- #END# Widgets -->
    <!-- CPU Usage -->


    <!-- #END# Bar Chart -->

</div>

