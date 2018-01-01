<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016011601098992",

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAvp4GtOLaJ6QG25XEASP9bZflyU2Rw9uJLJksmZjUchDFJGTzZx1xuzfIgwgWyONH/KvOFCdF2mpF8VEstMcR5guN9zrJy2rQEyX9Akz+xV1ZOkAvM9HyogTgASb3m5inCss4PB4Mtgn9S3NG/VjMqCQOPOXB4yb27jHX4jwf1O51m5b+ol5MMpoBAa30GH+y/BrVhT/vwXlHYceHhZ/biz3LdEE4dNPSOri9V2O3btjtnyYv3pilEoMb0e8unV2ONBhMm8Puz5p0j/G3U+Cfsa3EmlVQM/FrWymaRYu54CIQcqQU3CGFpKhIZG095nWBA/RTBQFN1euwhzVWUt1ISQIDAQABAoIBAF2Np5L9x74u5eK9xX4d0NMJ+xBqjsEGrXODFf2ooZP+IRO0rDWOoPQW88VDohMkYX9kPvdrMwB4qi0+/ucW0PUL9LhDVSkOGmNbgKqxaVUqdJF/UOto/mGAbQSDwIDQUiOdC9ONmAV8L6HpSQ0smP1o/Mfsp9U5mXXcZq01fxX8vOyABdZMPpNjVdhbZUe0CuL8rH3zkvIad1pvNBYbg7ftw72xsUMKo7kRiV1ObBme76aLhReTGLAJTISfV6wf+NWkBB+7pyPDrAwROtR9Z0uZQ5uhBaNz3S1pfJlAsArQgG7f/1mQBspNTakBw4TlRonBmb3qjS6CTUMlICvXI4ECgYEA9y8g2Tu88+fpkmfPCYy0HlwsAQdTAHaApnGfe9Nl38tz3ZZWAG6kIXioaj8c6A+OyHmkxg5sfxIhx38XJDPz+/EsER849nYL0e7kSwLL49zulAxs9snuOjIzZEHiEMSOQNCcW7s3hnzort4laIJzariB95Wo99gkzD7qbVyiU1ECgYEAxWpsqAVU0AFjSruC6dpU6mwPVq37MKeH2LceOmelcFAGc6U5Q8gbb9C0yP3/cFV74OUDQDHsRIn5jlhWMiGX8tKXWA2e3lg2rqpGUIjCkS3PpavaKARbSu/XzLou7ljA66U9/lfcFu8cmbiV+G/J/zCJTo2gZ000GTS36+AFt3kCgYABjsV5OPwm2VZKeub+G2njKxeH5iDqxtRmuB6WLC3fLCwNwG3IUOot39HH4Z/wAnEW6FVWfi7G2jlmRXHC46Ts+IcbkIPOYc4PQ58ireDVDcZfHnjtUTZ0HW7fed7P1j1DQU1K8rIV4eGhgHrh3riVepYvFj1bWnxY4SifCc9oEQKBgHTgXRPclCnRqIdGHGt2528iKrKWrnBPvw1+3FaXpkqoFinBV/XZMuUwGtgkCGbpNT4gV5xZ8hdh2G19vwpO+Ta5lwB6j+PzNeySwq5LSWXKSXU8GRw3+BSVip2aXM6fnRfl7J34RkUNq1EXBzLefCipA6GOF7kQ7BdALuNm7fuBAoGBAOOcgbf8m0Iq2cqz+PyhuNj1fVBwA6VIkyOntggn3aBxDHlHNzkhGncmjRjgjLtUzwOL2MHcWF+dQNhvuFbYW5fH4/Vr+SACQvdNbTmz2s0sx5Bzs7PPLtkiQsnGEiZ1yQybwfxCnuTxB/bCE5+tnOM2vToz6fVujBzOEDF5tvOi",
		
		//异步通知地址
		'notify_url' => "http://www.wudi.com/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.wudi.com/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkqV1eLjEteU5DhH1TFYhkIWTsz9D+ZwPg5AUNItZlSG0Ph3Nvj2aiS+uEU0GYxmV4HESOz6mXOyi2bY3zDq+hYN/R7LMNW5MtLNYyZo/8oCVJoIjQCx1ODwLPQOCUU8camaejLbeOXvwX/IEeOZywjE2VMizRs7CkcG+x16wJSS60X4e/yTEkNTBFCxMUG1ighzSHAnSN5jnkZ18txDC04UQnk4SIDhY2qnkItRadn1bLjrUB57si3ybfLYn8SbUyl5y5fU0jlOngQ9kRnVv1uEWn9P+82rzjQ89m1dU56sZn0JLd85w4yKZ9EXKq5binigLVqiilGfAFzCvc2lwZwIDAQAB",
);