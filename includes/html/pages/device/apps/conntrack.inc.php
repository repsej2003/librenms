<?php

$graph_type = 'conntrack_connections' ;
$graph_array['height'] = '100';
$graph_array['width'] = '215';
$graph_array['to'] = \LibreNMS\Config::get('time.now');
$graph_array['id'] = $app['app_id'];
$graph_array['type'] = 'application_' . 'conntrack_connections';

echo '<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title">' . 'Conntrack' . '</h3>
</div>
<div class="panel-body">
<div class="row">';
include 'includes/html/print-graphrow.inc.php';
echo '</div>';
echo '</div>';
echo '</div>';
