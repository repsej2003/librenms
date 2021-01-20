<?php

use LibreNMS\RRD\RrdDefinition;

$name = 'conntrack';
$app_id = $app['app_id'];

$connctions = $agent_data['app'][$name];

d_echo("connctions: $connctions\n");

$rrd_name = ['app', $name, $app_id];
$rrd_def = RrdDefinition::make()
    ->addDataset('Connctions', 'GAUGE', 0, 125000000000);

$fields = [
    'Connctions' => $connctions,
];

$tags = compact('name', 'app_id', 'rrd_name', 'rrd_def');

data_update($device, 'app', $tags, $fields);
update_application($app, $conntrack, $fields);

// Unset the variables we set here
unset($conntrack, $connctions, $conn, $rrd_name, $rrd_def, $tags);
