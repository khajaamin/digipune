<?php

namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
* 
*/
class SmsResponse extends Component
{
	public function getResponse($phone,$msg)
	{

		$encodeMsg = urlencode("Dear User Your OTP is ".$msg.", Thank You. www.sdadvertisements.com");
		$url ="http://www.eazy2sms.in/SMS.aspx?Userid=anwar123&Password=anwar@123&Mobile=".$phone."&Message=".$encodeMsg."&Type=1&TempId=81359";

		$options = array(
			CURLOPT_RETURNTRANSFER => true,   // return web page
	        CURLOPT_HEADER         => false,  // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
	        CURLOPT_ENCODING       => "",     // handle compressed
	        CURLOPT_USERAGENT      => "test", // name of client
	        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
	        CURLOPT_TIMEOUT        => 120,    // time-out on response				        
	    ); 
			 $ch = curl_init($url);
           
            curl_setopt_array($ch , $options);

	    $content  = curl_exec($ch);

	    curl_close($ch);

	    return $content;
	}
}