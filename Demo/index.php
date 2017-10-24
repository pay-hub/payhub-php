<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PayHub支付示例</title>
    <link rel="stylesheet" href="statics/index.css" type="text/css">
</head>
<body>
<div>
    <h2>应付总额： ¥1.00</h2>
    <p>请选择支付方式</p>
</div>
<form action="" method="POST" target="_blank">
    <div>
        <ul class="clear" style="margin-top:20px">
            <li onclick="clickSwitch(this)">
                <input type="radio" name="paytype" value="UN_PC">
                <img src="statics/images/un_pay.png"  alt="UN_PC" >
            </li>
        </ul>
    </div>
    <div>
        <input type="button" id="btn_pay" class="button" value="确认付款">
    </div>
</form>
<hr/>

<div>
    <h2>根据订单编号查询订单记录</h2>
    <p>请输入ID:</p>
</div>
<form method="POST">
    <div></div>
    <div>
        <input type="text" name="id" value="20171019867931" style="display:block;width:300px;height:25px">
        <input id="billQueryById" type="button" class="button" style="display:inline;" value="订单查询">
    </div>
</form>
<hr/>

</body>
<script type="text/javascript" src="statics/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    function clickSwitch(that) {
        var li = that.parentNode.children;
        for (var i = 0; i < li.length; i++) {
            li[i].className = "";
            li[i].childNodes[1].removeAttribute("checked");
        }
        that.className = "clicked";
        that.childNodes[1].setAttribute("checked", "checked");
    }

    $("#btn_pay").click(function(){
        var type = $("input[name='paytype']:checked").val();
        if(!type){
            alert("请选择支付方式");return;
        }
        window.open('./pay.php?type=' + type);
    });

    $("#billQueryById").click(function(){
        var id = $("input[name='id']").val();
        if(!id){
            alert('请输入订单编号');
            return;
        }
        window.open('./query.php?order_no=' + id);
    });
</script>
</html>