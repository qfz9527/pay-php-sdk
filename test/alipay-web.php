<?php

// +----------------------------------------------------------------------
// | pay-php-sdk
// +----------------------------------------------------------------------
// | 版权所有 2014~2017 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/pay-php-sdk
// +----------------------------------------------------------------------

include '../init.php';

// 加载配置参数
$config = require(__DIR__ . '/config.php');

// 参考请求参数  https://docs.open.alipay.com/203/107090/
$options = [
    'out_trade_no' => '3252345', // 商户订单号
    'total_amount' => '1', // 支付金额
    'subject'      => '支付订单描述', // 支付订单描述
];

// 参考公共参数  https://docs.open.alipay.com/203/107090/
$config['notify_url'] = 'http://localhost/notify.php';
$config['return_url'] = 'http://localhost/return.php';

// 实例支付对象
$pay = new \Pay\Pay($config);

try {
    $result = $pay->driver('alipay')->gateway('web')->apply($options);
    echo '<pre>';
    var_export($result);
} catch (Exception $e) {
    echo $e->getMessage();
}


