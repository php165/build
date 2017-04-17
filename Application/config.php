<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'ad',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ad_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEBUG'              =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'SHOW_PAGE_TRACE'       =>  true,//显示页面Trace信息

    'alipay_config'=>array(//支付宝配置

        //合作身份者id，以2088开头的16位纯数字//
        'partner'               => '',

        //安全检验码，以数字和字母组成的32位字符//
        'key'                   => '',
        //签名方式 不需修改
        'sign_type'    => strtoupper('MD5'),

        //字符编码格式 目前支持 gbk 或 utf-8
        'input_charset'=> strtolower('utf-8'),

        //ca证书路径地址，用于curl中ssl校验
        //请保证cacert.pem文件在当前文件夹目录中
        'cacert'    => getcwd().'/cacert.pem',

        //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
        'transport'    => 'http'
    ),
        /**************************请求参数配置**************************/
    'alipay'=>array(//支付宝配置
        //支付类型
        'payment_type' => 1,
        //必填，不能修改
        //服务器异步通知页面路径
         'notify_url'   =>'http://123.57.207.28:50011/Home/Alipay/notifyurl',
        //需http://jzd格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
         'return_url'   =>'http://123.57.207.28:50011/Home/Alipay/usersurl',
        //需http://jzd格式的完整路径，不能加?id=123这类自定义参数，不能写成http://jzdlocalhost/

        //卖家支付宝帐户
        'seller_email' => ''//申请的账号
    ),
);