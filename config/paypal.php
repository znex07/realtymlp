<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => 'AV0iFt15T5OSMuoZ5BXCiefFPtxoF9xwKaTBn6UVNMIwq8_Jbo1Wk3Nz9unOHL3mxhyuZ91Sm0XnpnZ1',
		'ClientSecret' => 'EK-h0q6jkA0xTW3IiG5o1W--dRjKcljslm2RugztWdgK-Jeph4Tf6PoOzyg7FXHvhM7Bd6OaVaRGBsfO',
	),

	# Connection Information
	'Http' => array(
		'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		'LogLevel' => 'FINE',
	),
);
