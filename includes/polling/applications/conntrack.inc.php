<?php

use LibreNMS\RRD\RrdDefinition;

$name = 'conntrack';
$app_id = $app['app_id'];
if (!empty($agent_data['app'][$name])) {
    $conntrack = $agent_data['app'][$name];
} else {
    // Polls conntrack statistics from script via SNMP
    $conntrack = snmp_get($device, '.1.3.6.1.4.1.8072.1.3.2.3.1.2.5.110.103.105.110.120', '-Ovq');
}
$conntrack = trim($conntrack, '"');

echo ' conntrack';

$connctions = (int)$conntrack;
d_echo("connctions: $connctions\n");

$rrd_name = ['app', $name, $app_id];
$rrd_def = RrdDefinition::make()
    ->addDataset('Connctions', 'GAUGE', 0, 125000000000);

$fields = [
    'Connctions' => 10,
];

$tags = compact('name', 'app_id', 'rrd_name', 'rrd_def');

data_update($device, 'app', $tags, $fields);
update_application($app, $conntrack, $fields);

// Unset the variables we set here
unset($conntrack, $connctions, $conn, $rrd_name, $rrd_def, $tags);
