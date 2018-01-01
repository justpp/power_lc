<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='ee9920b7a72d0a73ae7b8fc2d0b5b1fd';
//填写在开发者控制台首页上的Auth Token
$options['token']='3c7c2f37c0d3fc28e151ca9a8af3ffb7';

//初始化 $options必填
$ucpass = new Ucpaas($options);