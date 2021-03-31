<?php
return [

    //  当前平台的key

    'key'           =>  env('CEC_KEY', 'system'),


    //  websocket 地址
    'socket-url'    =>  env('CEC_URL', ''),

    //  端口
    'port'          =>  env('CEC_PORT', 9251),

    //  token
    'token'         =>  env('CEC_TOKEN', null),
];
