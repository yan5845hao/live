<?php
include('alipayOrderProcess.php');
if ($pay_status) {
    echo "success";
} else {
    echo "fail";
}