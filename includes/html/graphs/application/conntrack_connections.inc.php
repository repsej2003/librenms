<?php

$scale_min = '0';

require 'includes/html/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], ['app', 'conntrack', $app['app_id']]);

$rrd_options .= ' DEF:Connctions=' . $rrd_filename . ':Connctions:AVERAGE';
$rrd_options .= " 'COMMENT:Connctions        Cur      Min     Max     Avg\\n'";

$rrd_options .= ' LINE1.25:Connctions#36393d:Connctions';

$rrd_options .= ' GPRINT:Connctions:LAST:%14.2lf  GPRINT:Connctions:AVERAGE:%6.2lf';
$rrd_options .= " GPRINT:Connctions:MAX:%6.2lf  'GPRINT:Connctions:AVERAGE:%6.2lf\\n'";

/*require 'includes/html/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], ['app', 'conntrack', $app['app_id']]);

$rrd_options .= ' DEF:Connctions=' . $rrd_filename . ':Connctions:AVERAGE';
$rrd_options .= " 'COMMENT:                        Now      Min     Max     Avg\\n'";
$rrd_options .= ' LINE1.25:Connctions#36393d:Connctions';
$rrd_options .= ' GPRINT:Connctions:LAST:%14.2lf  GPRINT:Connctions:AVERAGE:%6.2lf';
$rrd_options .= " GPRINT:Connctions:MAX:%6.2lf  'GPRINT:Connctions:AVERAGE:%6.2lf\\n'";
