<?php
$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
echo $date->format('Y-m-d H:i:s');