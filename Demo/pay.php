<?php
require_once("../loader.php");

try {
	$api->registerApp(APP_ID, APP_SECRET);
} catch (Exception $e) {
	die($e->getMessage());
}

$data = array();
$type = $_GET['type'];
if (empty($type)) {
	die('参数type 不能为空');
}
$data['merchant_id'] = 2;//商户ID
$data['app_id'] = 6;//应用ID
$data['user_id'] = 6;//用户ID
$data['pay_channel'] = $type;//渠道类型 ALI_PC,ALI_H5,ALI_APP,WX_PC,WX_H5,WX_APP,UN_PC,UN_H5,UN_APP
$data['amount'] = 100;//订单金额 必须是正整数，单位为分
$data['sign'] = md5(APP_ID . APP_SECRET);//签名 md5(app_id+ap_secret)
$data['return_url'] = 'https://api-test.pay-hub.cn';//支付渠道处理完请求后,当前页面自动跳转到商户网站里指定页面的http路径，中间请勿有#,?等字符
$data['webhook_url'] = 'test.com';//订单结果异步通知url
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>payhub支付示例</title>
</head>
<body>
<?php
try {
	$result = $api->pay($data);
	if ($result->status_code == 500) {
		var_dump($result);
		exit();
	}
	if (isset($result->data)) {
		echo $result->data->html;
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
?>
</body>
</html>
