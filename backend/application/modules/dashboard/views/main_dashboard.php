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
  {"period": "2012-10-01", "licensed": 660, "sorned": 660},
  {"period": "2012-09-30", "licensed": 3351, "sorned": 629},
  {"period": "2012-09-29", "licensed": 3269, "sorned": 618},
  {"period": "2012-09-20", "licensed": 3246, "sorned": 661},
  {"period": "2012-09-19", "licensed": 3257, "sorned": 667},
  {"period": "2012-09-18", "licensed": 3248, "sorned": 627},
  {"period": "2012-09-17", "licensed": 3171, "sorned": 660},
  {"period": "2012-09-16", "licensed": 3171, "sorned": 676},
  {"period": "2012-09-15", "licensed": 3201, "sorned": 656},
  {"period": "2012-09-10", "licensed": 3215, "sorned": 622}
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
