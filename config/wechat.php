<?php

return [
    'debug'  => true,
    /**
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    'app_id'  => env('WECHAT_APPID', ''),                  // AppID
    'secret'  => env('WECHAT_SECRET', ''),   // AppSecret
    'token'   => env('WECHAT_TOKEN', ''),                      // Token
    'aes_key' => '',                    // EncodingAESKey，安全模式下请一定要填写！！！
    /**
     * 日志配置
     *
     * level: 日志级别, 可选为：
     *         debug/info/notice/warning/error/critical/alert/emergency
     * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
     * file：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log' => [
        'level'      => 'debug',
        'permission' => null,
        'file'       => storage_path("logs/wechat.log"),
    ],
    /**
     * OAuth 配置
     *
     * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
     * callback：OAuth授权完成后的回调页地址
     */
    'oauth' => [
        'scopes'   => ['snsapi_base'],
        'callback' => '/v1/weChatCallback',
    ],
    /**
     * 微信支付
     */
    'payment' => [
        'merchant_id'        => 'your-mch-id',
        'key'                => 'key-for-signature',
        'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
        'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
        // 'device_info'     => '013467007045764',
        // 'sub_app_id'      => '',
        // 'sub_merchant_id' => '',
        // ...
    ],
    /**
     * Guzzle 全局设置
     *
     * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
     */
    'guzzle' => [
        'timeout' => 3.0, // 超时时间（秒）
        //'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
    ],

    'template_id' => [
        'buy_success' => env('WECHAT_TEMPLATE_BUY_SUCCESS', 'T5eH-aBQawFVojQRYtZ2NEW7uR4sZkujfRTwROWX3zo'),
        'get_paper' => env('WECHAT_TEMPLATE_GET_PAPER', 'Cbptuhq8Bdhscpln4OqZvgJRrkEO73mCkFkWpq2NKiI'),
    ],

    //多个微信公众号的基础信息
    //zhanghao 2017-11-7 choose_info以及choose_appid从本次更新之后逐渐由WxConfigService的方法替代，由数据库+缓存方案解决
    'choose_info' => [
        'lpf' => [
            'name'   => '在海洋上空飞翔的羊',
            'app_id' => 'wx3e2968fb448ca1d4',
            'secret' => '2d839eae8a64fe08d2d6a752a37c3d9a',
            'token'  => '202910',
        ],
        'tower' => [
            'app_id'  => 'wx1c8ee13520314aef',
            'secret'  => '947a520398e2788a963b6ebc37eaa363',
            'token'   => 'tower20170116successserver',
            'template_id' => [
                'buy_success'   => 'T5eH-aBQawFVojQRYtZ2NEW7uR4sZkujfRTwROWX3zo',
                'get_paper'     => 'Cbptuhq8Bdhscpln4OqZvgJRrkEO73mCkFkWpq2NKiI',
            ],
        ],
        'changzhou' => [
            'name'      => '学而思常州',
            'app_id'    => 'wx8f9357d84fe87358',
            'secret'    => '384c0452062eb1a8eb8777bd8b9276f7',
            'token'     => 'damo',
        ],
        'ceshi' => [
            'app_id'    => 'wx73f12a2d13131194',
            'secret'    => 'ddc6cb8c65f95ab2320b27c9f3d6ba6e',
            'token'     => 'damo',
        ],
        'zhanjiang' =>[
            'app_id'    => 'wxc199f804cc714269',
            'secret'    => 'b6e8f4a6055341b7e2b6e7497d86c296',
            'token'     => 'damo',
        ],
        'beijing-zaixian' =>[
            'name'      => '北京学而思培优在线',
            'app_id'    => 'wx2175201e60914903',
            'secret'    => 'd577e94b1b84e3070601ad832b667a4c',
            'token'     => 'damo',
        ],
        'beijing-zaixian-test' =>[
            'name'      => '北京学而思培优在线测试',
            'app_id'    => 'wxad1d902de497b77f',
            'secret'    => '6277cdc88eeade250cf4d009a9f44936',
            'token'     => 'damo',
        ],
    ],

    'choose_appid' => [
        'gh_93fdc271672d' => 'changzhou',
        'gh_19ec63314b43' => 'ceshi',
        'gh_41437b70af58' => 'zhanjiang',
        'gh_04f4206ea262' => 'beijing-zaixian',
        'gh_5862fb265ca5' => 'beijing-zaixian-test',
    ],

];

