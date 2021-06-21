<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => 'Af9PHRCrOeUoPVrdfbqjkg6XetVENG8zQ2Ar2FI2qcsXp2neHMGDPHn1Euz6mJLNdkKdVCfhHl8INXYx',
		'ClientSecret' => 'EGhJ1Xf-UQwpo0HYOwdHw7iKs2SsLte4P3K1hQUzOz3kg8Mln17Z3z4z8iIPKiFWk-xo2RpmlSUgyl-7',
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
