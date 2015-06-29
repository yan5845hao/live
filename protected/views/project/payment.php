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
        <div class="common_tit"><h1 class="common_tit_name">和谢霆锋一起做公益</h1></div>
        <div class="module_con">
            <!-----------------需要回报内容开始-------------->
            <div>
                <div class="module_item">
                    <dl>
                        <dt>支持金额：</dt>
                        <dd><span class="f_red20">1</span></dd>
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
                            支持1元  不限量
                            感谢您的爱心支持，您将获得电子感谢信（请备注您的邮箱）。由京东众筹官方从支持者中抽取100人，幸运用户将获得谢霆锋公益众筹线下活动资格，中奖名单及活动规则在话题公布。
                            “同一账号多次支持仅限一次”
                        </dd>
                    </dl>
                    <dl>
                        <dt>备注：</dt>
                        <dd><input type="text" class="inp_remark" placeholder="您可以填写关于回报或您希望发起人知道的信息，鼓励一下也好~~" maxlength="100" id="_remarks" name="_remarks"></dd>
                    </dl>
                </div>
                <div class="module_item">
                    <dl>
                        <dt>收货人：</dt>
                        <dd>
                            <div id="showAddress" class="clearfix write_repeat">


                                <p>莫德蜜 182****8709 <span style="color: #ff0000;">(手机号码用于接收回报信息，请确认无误！)</span></p>
                                <p>四川成都市高新区绕城环线以外中和镇丹桂苑24幢2单元5楼&nbsp;&nbsp;&nbsp;<a href="javascript:editAddress();" class="f_blue repeat">修改</a>
                                </p>
                                <input type="hidden" name="realId" id="realId" value="136445325">
                            </div>
                            <div style="display:none;" class="clearfix write_edit">
                                <div id="addressList" class="bor_t_li">
                                    <p class="addrHover">
                                        <input type="radio" addrfulladdress="四川成都市高新区绕城环线以外中和镇丹桂苑24幢2单元5楼" addrphone="" addrmobile="182****8709" addremail="99*****19@qq.com" addrname="莫德蜜" value="136445325" selected="" id="addrList_136445325" name="addrList" checked="checked" onclick="changeAddressOpt();">&nbsp;
                                        <label for="136445325">莫德蜜&nbsp;&nbsp;中和镇丹桂苑24幢2单元5楼&nbsp;182****8709</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:editaddr('136445325','莫德蜜','中和镇丹桂苑24幢2单元5楼','','182****8709','99*****19@qq.com','22','1930','50949','4283');" class="f_blue">编辑</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:removeaddr('136445325');" class="f_blue write_del">删除</a></p>

                                    <p>
                                        <input type="radio" addrfulladdress="上海徐汇区内环中环之间桂林路396号浦园科技1号楼306室" addrphone="" addrmobile="159****6921" addremail="17******28@qq.com" addrname="屈敏" value="137582442" id="addrList_137582442" name="addrList" onclick="changeAddressOpt();">&nbsp;
                                        <label for="137582442">屈敏&nbsp;&nbsp;桂林路396号浦园科技1号楼306室&nbsp;159****6921</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:editaddr('137582442','屈敏','桂林路396号浦园科技1号楼306室','','159****6921','17******28@qq.com','2','2813','2865','0');" class="f_blue">编辑</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="javascript:removeaddr('137582442');" class="f_blue write_del">删除</a></p>

                                </div>
                                <p class="add_more mt10">
                                    <a class="bor_btn pr " href="javascript:void(0);">更多常用地址<i class="down_icon"></i></a>
                                </p>

                                <div class="bor_t_li">
                                    <p class="bg_yellow840">
                                        <input type="radio" value="0" onclick="newAddress();" name="addrList"> 使用新地址
                                    </p>
                                    <div style="display: none;" id="modifyaddDiv">
                                        <input type="hidden" value="" name="addressId" id="addressId">
                                        <input type="hidden" value="" name="addressOpt" id="addressOpt">

                                        <div class="new_add pt10">
                                            <dl>
                                                <dt><span class="f_red">*</span> 收货人：</dt>
                                                <dd><input type="text" class="inp145" id="name" name="name"></dd>
                                            </dl>
                                            <dl>
                                                <dt><span class="f_red">*</span>所在地区：</dt>
                                                <dd>
                                                    <select class="sel75" onchange="loadcitys();" id="consignee_province" name="consignee_province">
                                                        <option selected="" value="0">请选择</option>
                                                    </select>
                                                    <select class="sel75" onchange="loadCountys();" id="consignee_city" name="consignee_city">
                                                        <option selected="" value="0">请选择</option>
                                                    </select>
                                                    <select class="sel75" onchange="loadTowns()" id="consignee_countyid" name="consignee_countyid">
                                                        <option selected="" value="0">请选择</option>
                                                    </select>
                                                <span class="sel75" style="display: none;" id="span_town">
                                                    <select onchange="setTownName();" id="consignee_town">
                                                        <option value="0" selected="">请选择</option>
                                                    </select>
                                                </span>
                                                </dd>
                                            </dl>
                                            <dl>
                                                <dt><span class="f_red">*</span> 详细地址：</dt>
                                                <dd><span id="area_div"></span><input type="text" class="inp315" id="consignee_address" name="consignee_address"></dd>
                                            </dl>
                                            <dl>
                                                <dt><span class="f_red">*</span> 手机号码：</dt>
                                                <dd><input type="text" maxlength="11" class="inp145" onclick="value='';focus()" id="mobile" name="mobile">&nbsp;&nbsp;&nbsp;&nbsp;<spanclass="f_333">固定电话：
                                                    <input type="text" maxlength="20" class="inp145" id="phone" name="phone" onclick="value='';focus()"></spanclass="f_333"></dd>
                                            </dl>
                                            <dl>
                                                <dt>邮箱：</dt>
                                                <dd><input type="text" onclick="value='';focus()" maxlength="30" class="inp145" id="email" name="email"></dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <p class="mt10"><a onclick="saveAddress();" class="btn130_red ml10" href="#">保存收货人地址</a></p>
                                </div>
                            </div>
                        </dd>

                    </dl>
                </div>
            </div>
            <!-----------------需要回报内容结束-------------->
            <div class="risk_tips">
                <b>风险说明：</b>

                <p>
                    京东众筹是一个开放的众筹平台，公众基于对项目、发起人和回报的认同，通过资助的方式参与和支持创新。
                    <br>筹资成功后，执行的过程中，如果项目没有按照预期的目标执行，项目发起人可能无法正常发放回报。如果产生了这种情况，您支持金额中的部分金额会退还给您，但是由于其中部分金额已经被项目组织者使用，您需要和项目组织者协商订金退还的事宜，京东众筹没有帮您追讨资金的义务。
                </p>
                <br>
                <b>特别说明：</b>

                <p>
                    <font color="#FF0000">系统会自动对超出限额的订单进行全额退款。对您造成的不便，深表歉意！</font>
                </p>

            </div>

            <div class="common_button">
                <form method="post" action="/funding/project_subscribe.action" id="frm">
                    <input type="hidden" id="remarks" name="remarks" value="">
                    <input type="hidden" value="13514" name="projectId" id="projectId">
                    <input type="hidden" value="13514" id="_projectId">
                    <input type="hidden" value="51828" name="redoundId" id="redoundId">
                    <input type="hidden" value="莫德蜜" name="userName" id="userName">
                    <input type="hidden" value="182****8709" name="userPhone" id="userPhone">
                    <input type="hidden" value="四川成都市高新区绕城环线以外中和镇丹桂苑24幢2单元5楼" name="userAddressDetail" id="userAddressDetail">
                    <input type="hidden" value="99*****19@qq.com" name="userEmail" id="userEmail">
                    <input type="hidden" value="0" name="invoiceFlag" id="invoiceFlag">
                    <input type="hidden" value="" name="invoiceTitle" id="invoiceTitle">
                    <input type="hidden" value="pc" name="ordFrom" id="ordFrom">
                    <input type="hidden" value="136445325" name="userAddressId" id="userAddressId">
                    <input type="hidden" value="1" name="isRedound" id="isRedound">
                    <input type="hidden" value="1" name="supperAmount" id="supperAmount">
                </form>
                <button clstag="jr|keycount|jr_zc_support|txy" style="cursor: hand;" onclick="next();" jrtag="29|51828" id="btn_next">下一步</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>