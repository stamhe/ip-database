<?php
/**
 * @author Zhao Binyan <itbudaoweng@gmail.com>
 * @since  2015-06-11
 */

//you do not need to do this if use composer!
require dirname(__DIR__) . '/src/IpLocation.php';

use itbdw\Ip\IpLocation;

$ip = isset($_GET['ip']) ? $_GET['ip'] : $_SERVER['REMOTE_ADDR'];
if(empty($ip)) {
    $ip = $_SERVER['REMOTE_ADDR'];
}

// 判断请求来源. 使用不同的换行符
$ua = $_SERVER[''];
$line_end = "<br/>";
if(stripos($ua, 'curl') === false) {
    $line_end = "<br />";
} else {
    $line_end = PHP_EOL;
}

echo "纯真数据库:" . $line_end;
echo json_encode(IpLocation::getLocation($ip), JSON_UNESCAPED_UNICODE) . $line_end;

echo "ip2region:" . $line_end;





