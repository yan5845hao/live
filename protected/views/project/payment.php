<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>订单信息填写页</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">

    .z_container {
        margin: 0 auto;
        width: 1000px;
    }
    body.page-header {
        background: #f3f3f3 none repeat scroll 0 0;
    }
    .mt20 {
        margin-top: 20px;
    }
    textarea {
        overflow: auto;
        resize: none;
    }
    .order_process li {
        float: left;
        position: relative;
        text-align: center;
        width: 25%;
        z-index: 0;
        list-style: none;
    }
    .module_wrap {
        background: #fff none repeat scroll 0 0;
        border: 1px solid #dedbdb;
    }
    .common_tit {
        background: #fafafa none repeat scroll 0 0;
        border-bottom: 1px solid #dedbdb;
        height: 59px;
        line-height: 59px;
    }
    .common_tit .common_tit_name {
        color: #444;
        font-family: "microsoft yahei";
        font-size: 22px;
        font-weight: normal;
        padding: 0 20px;
    }
    .module_con {
        color: #666;
    }
    .module_con dl {
        line-height: 24px;
        margin: 0 20px;
        min-height: 24px;
        padding: 5px 0 5px 100px;
    }
    .module_con dl dt {
        color: #333;
        float: left;
        font-weight: bold;
        margin-left: -95px;
        text-align: right;
        width: 85px;
    }
    .module_item {
        border-bottom: 1px dashed #e3e3e3;
        padding: 10px 0;
    }
    .risk_tips {
        background: #fffdee none repeat scroll 0 0;
        border: 1px solid #edd28b;
        border-radius: 4px;
        margin: 24px 40px;
        padding: 20px;
    }
    .risk_tips p {
        line-height: 18px;
        margin-top: 10px;
    }
    .common_button {
        padding: 24px 0;
        text-align: center;
    }
    .common_button button {
        background: #ff6559 none repeat scroll 0 0;
        border-radius: 4px;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: "Microsoft Yahei";
        font-size: 16px;
        height: 38px;
        line-height: 38px;
        text-align: center;
        text-decoration: none;
        width: 100px;
    }
    .f-Arial {
        font-family: "Arial";
    }
    .f-bold {
        font-weight: bold;
    }
    .f-font14 {
        font-size: 14px;
    }
    .fav {
        background: #ebecec none repeat scroll 0 0;
        margin-top: 30px;
        padding: 20px 0;
    }
    .fav-inner {
        margin: 10px auto 0;
        width: 1000px;
    }
    .fav-tit {
        overflow: hidden;
    }
    .fav-tit h3 {
        background: rgba(0, 0, 0, 0) url("i/fav.png") no-repeat scroll 2px 4px;
        color: #333;
        float: left;
        font-size: 18px;
        font-weight: normal;
        padding-left: 26px;
    }
    .fav-tit a {
        background: rgba(0, 0, 0, 0) url("i/change.png") no-repeat scroll left top;
        color: #5e5e5e;
        float: right;
        line-height: 20px;
        padding-left: 20px;
        padding-right: 5px;
        text-decoration: none;
    }
    .fav-tit a:hover {
        color: #005ea7;
    }
    .query-result-outer {
        margin-left: -19px;
        padding-top: 20px;
    }
    .query-result-list {
        background: #fff none repeat scroll 0 0;
        box-shadow: 0 3px 3px #e5e5e5;
        float: left;
        height: 390px;
        margin-bottom: 20px;
        margin-left: 19px;
        overflow: hidden;
        width: 235px;
    }
    .query-result-list:hover {
        box-shadow: 4px 4px 4px #e5e5e5;
    }
    .q-title {
        line-height: 28px;
    }
    .q-title a {
        color: #474e5d;
        text-decoration: none;
    }
    .q-title, .q-progress, .q-info {
        padding-left: 10px;
    }
    .q-progress {
        height: 18px;
        margin-bottom: 12px;
        margin-top: 12px;
        padding-right: 80px;
        position: relative;
    }
    .q-progress-bar {
        background: #dde3e5 none repeat scroll 0 0;
        border-radius: 8px;
        height: 8px;
        line-height: 0;
        width: 100%;
    }
    .q-progress-bar span {
        background: #a5ca4d none repeat scroll 0 0;
        float: left;
        height: 8px;
        line-height: 0;
        width: 0;
    }
    .q-em {
        background: rgba(0, 0, 0, 0) url("i/s8.png") repeat scroll 0 0;
        height: 23px;
        line-height: 23px;
        overflow: hidden;
        position: absolute;
        right: 10px;
        text-indent: 10px;
        top: -7px;
        width: 65px;
    }
    .ing {
        background-position: 0 0;
        color: #fff;
    }
    .over {
        background-position: 0 -33px;
    }
    .will {
        background-position: 0 -66px;
        color: #999;
    }
    .q-info {
        height: 49px;
        margin-left: 5px;
        margin-right: 5px;
    }
    .q-info div {
        float: left;
    }
    .q-info-1 {
        width: 60px;
    }
    .q-info-2 {
        width: 96px;
    }
    .q-info-3 {
        width: 50px;
    }
    .q-support {
        background: #f6f7f8 none repeat scroll 0 0;
        height: 36px;
        line-height: 36px;
        text-align: right;
        width: 100%;
    }
    .ml10 {
        margin-left: 10px;
    }
    .mr10 {
        margin-right: 10px;
    }
    </style>
</head>
<body>
<div class="z_container">
    <div class="order_process">
        <ul>
            <li class="active">
                订单信息填写页
                <span class="order_behind_arrow order_arrow"></span>
                <span class="order_ahead_arrow order_arrow"></span>
            </li>
            <li>
                订单信息确认页
                <span class="order_behind_arrow order_arrow"></span>
                <span class="order_ahead_arrow order_arrow"></span>
            </li>
            <li>
                支付
                <span class="order_behind_arrow order_arrow"></span>
                <span class="order_ahead_arrow order_arrow"></span>
            </li>
            <li>
                完成
                <span class="order_behind_arrow order_arrow"></span>
                <span class="order_ahead_arrow order_arrow"></span>
            </li>
        </ul>
    </div>
    <br />
    <div class="module_wrap mt20">
        <div class="common_tit"><h1 class="common_tit_name"><?php echo $product->title;?></h1></div>
        <div class="module_con">
            <!-----------------需要回报内容开始-------------->
            <div>
                <div class="module_item">
                    <dl>
                        <dt>支持金额：</dt>
                        <dd><span class="f_red20"><?php echo $description->price;?></span></dd>
                    </dl>
                    <dl>
                        <dt>配送费用：</dt>
                        <dd>
                            免运费
                        </dd>
                    </dl>
                    <dl>
                        <dt>回报内容：</dt>
                        <dd>
                            <?php echo $description->content;?>
                        </dd>
                    </dl>
                </div>
                <div class="module_item">
                    <dl>
                        <dt>收货人：</dt>
                        <dd>
                            <div id="showAddress" class="clearfix write_repeat">


                                <p><?php echo $customer->user_name?> <?php echo Yii::app()->user->phone?> <span style="color: #ff0000;">(手机号码用于接收回报信息，请确认无误！)</span></p>
                                <p><?php echo $customer->address?>&nbsp;&nbsp;&nbsp;<a href="/myAccount/address" class="f_blue repeat">修改</a>
                                </p>
                                <input type="hidden" name="realId" id="realId" value="136445325">
                            </div>
                        </dd>

                    </dl>
                </div>
            </div>
            <!-----------------需要回报内容结束-------------->
            <div class="risk_tips">
                <b>风险说明：</b>

                <p>
                    捕梦网众筹是一个开放的众筹平台，公众基于对项目、发起人和回报的认同，通过资助的方式参与和支持创新。
                    <br>筹资成功后，执行的过程中，如果项目没有按照预期的目标执行，项目发起人可能无法正常发放回报。如果产生了这种情况，您支持金额中的部分金额会退还给您，但是由于其中部分金额已经被项目组织者使用，您需要和项目组织者协商订金退还的事宜，捕梦网众筹没有帮您追讨资金的义务。
                </p>
                <br>

            </div>

            <div class="common_button">
                <form method="post" action="/project/payment" id="frm">
                    <input type="hidden" value="<?php echo $product->product_id;?>" name="product_id">
                    <input type="hidden" value="<?php echo $description->price;?>" name="total">
                    <input type="hidden" value="<?php echo $description->product_project_description_id;?>" name="product_project_description_id">
                    <button clstag="jr|keycount|jr_zc_support|txy" style="cursor: hand;" type="submit">提交</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>