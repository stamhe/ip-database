<?php
/**
 * @author Zhao Binyan <itbudaoweng@gmail.com>
 * @since  2015-06-11
 */

//you do not need to do this if use composer!
require dirname(__DIR__) . '/src/IpLocation.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

use itbdw\Ip\IpLocation;

$ip = isset($_GET['ip']) ? $_GET['ip'] : $_SERVER['REMOTE_ADDR'];
if(empty($ip)) {
    $ip = $_SERVER['REMOTE_ADDR'];
}

// 判断请求来源. 使用不同的换行符
$ua = $_SERVER['HTTP_USER_AGENT'];
$line_end = "<br/>";
if(stripos($ua, 'curl') === false) {
    $line_end = "<br />";
} else {
    $line_end = PHP_EOL;
}

if(!filter_var($ip,FILTER_VALIDATE_IP)) {
    echo "非法的IP" . $line_end;
    exit;
}


echo "纯真数据库:" . $line_end;
echo json_encode(IpLocation::getLocation($ip), JSON_UNESCAPED_UNICODE) . $line_end . $line_end;

echo "ip2region:" . $line_end;
$ip2regionObj = new Ip2Region();
echo json_encode($ip2regionObj->memorySearch($ip), JSON_UNESCAPED_UNICODE) . $line_end . $line_end;





