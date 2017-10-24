<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>payhub 根据订单编号查询记录示例</title>
</head>
<body>
<table border="1" align="center" cellspacing=0>
    <?php
    require_once("../loader.php");
    $order_no = $_GET['order_no'];
    if (empty($order_no)) {
	    die('参数order_no 不能为空');
    }
    $data = array();
    $data['app_id'] = 6;//应用ID
    $data['sign'] = md5(APP_ID . APP_SECRET);//签名 md5(app_id+ap_secret)
    $data["order_no"] = $order_no;//订单编号
    try {
	    $api->registerApp(APP_ID, APP_SECRET);
	    $result = $api->query($data);
	    if ($result->status !='succeed') {
		    print_r($result);
		    exit();
	    }
	    $data = $result->data;
	    $str = "<tr><th>订单号</th><th>总价(分)</th><th>是否支付</th><th>创建时间</th></tr>";
	    if($data){
		    $create_time = isset($data->create_time) && $data->create_time ? date('Y-m-d H:i:s', $data->create_time/1000) : '';
		    $spay_result = $data->spay_result ? '支付' : '未支付';
		    $str .= "<tr><td>$data->order_no</td><td>$data->total_fee</td><td>$spay_result</td><td>$create_time</td></tr>";
	    }
	    echo $str;
    } catch (Exception $e) {
        die($e->getMessage());
    }
    ?>
</table>
</body>
</html>