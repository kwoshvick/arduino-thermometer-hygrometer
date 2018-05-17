<!doctype html>
<head xmlns="">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="<?php echo base_url('assets/morrisjs/morris.js')?>"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
    <script src="<?php echo base_url('assets/morrisjs/examples/lib/example.js')?>"></script>
    <link rel="stylesheet" href=""<?php echo base_url('assets/morrisjs/lib/example.css')?>">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/morrisjs/morris.css')?>">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<h1>Formatting Dates YYYY-MM-DD</h1>
<div id="graph"></div>

<script>

var day_data = [
    <?php
        print_r($chart)
    ?>
];
Morris.Line({
  element: 'graph',
  data: day_data,
  xkey: 'period',
  ykeys: ['humidity', 'temperature'],
  labels: ['Humidity', 'Temperature']
});
</script>
</body>
