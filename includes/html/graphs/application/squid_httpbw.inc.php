<?php

$name = 'squid';
$app_id = $app['app_id'];
$colours = 'mixed';
$unit_text = 'kB/s';
$unitlen = 10;
$bigdescrlen = 10;
$smalldescrlen = 10;
$dostack = 0;
$printtotal = 0;
$addarea = 1;
$transparency = 15;

$rrd_filename = rrd_name($device['hostname'], ['app', $name, $app_id]);

if (rrdtool_check_rrd_exists($rrd_filename)) {
    $rrd_list = [
        [
            'filename' => $rrd_filename,
            'descr'    => 'HTTP in',
            'ds'       => 'httpinkb',
            'colour'   => 'd46a6a',
        ],
        [
            'filename' => $rrd_filename,
            'descr'    => 'HTTP out',
            'ds'       => 'httpoutkb',
            'colour'   => '28774f',
        ],
    ];
} else {
    echo "file missing: $rrd_filename";
}

require 'includes/html/graphs/generic_v3_multiline.inc.php';
