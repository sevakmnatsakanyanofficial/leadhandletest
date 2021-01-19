<?php

exec('php /usr/src/myapp/index-lead.php > /dev/null &');

/**
 * we have 600 sec (10 min)
 * 1 job is about 2 sec (sleep time)
 * 600 / 2 = 300 => we have 300 steps
 * we have 10000 records so 10000/300 = 33.33 it means we need 33.33 parallel workers => 34
 */
for ($i = 1; $i <= 34; $i++) {
    exec('php /usr/src/myapp/index-handler.php > /dev/null &');
}
