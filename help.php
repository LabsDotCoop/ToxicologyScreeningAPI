<?php
/**
 * Chronolabs REST Screening Selector API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://labs.coop
 * @license         General Public License version 3 (http://labs.coop/briefs/legal/general-public-licence/13,3.html)
 * @package         screening
 * @since           1.0.2
 * @author          Simon Roberts <wishcraft@users.sourceforge.net>
 * @version         $Id: functions.php 1000 2013-06-07 01:20:22Z mynamesnot $
 * @subpackage		api
 * @description		Screening API Service REST
 */

	$pu = parse_url($_SERVER['REQUEST_URI']);
	$source = (isset($_SERVER['HTTPS'])?'https://':'http://').strtolower($_SERVER['HTTP_HOST']).$pu['path'];
	if (strlen($theip = whitelistGetIP(true))==0)
		$theip = "127.0.0.1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 	$servicename = "Chemical Toxicology Screening"; 
		$servicecode = "CTS"; ?>
	<meta property="og:url" content="<?php echo (isset($_SERVER["HTTPS"])?"https://":"http://").$_SERVER["HTTP_HOST"]; ?>" />
	<meta property="og:site_name" content="<?php echo $servicename; ?> Open Services API's (With Source-code)"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="rating" content="general" />
	<meta http-equiv="author" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="copyright" content="Chronolabs Cooperative &copy; <?php echo date("Y")-1; ?>-<?php echo date("Y")+1; ?>" />
	<meta http-equiv="generator" content="wishcraft@users.sourceforge.net" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<link rel="apple-touch-icon" href="//labs.partnerconsole.net/execute2/external/reseller-logo">
	<meta property="og:image" content="//labs.partnerconsole.net/execute2/external/reseller-logo"/>
	<link rel="stylesheet" href="/style.css" type="text/css" />
	<link rel="stylesheet" href="//css.ringwould.com.au/3/gradientee/stylesheet.css" type="text/css" />
	<link rel="stylesheet" href="//css.ringwould.com.au/3/shadowing/styleheet.css" type="text/css" />
	<title><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</title>
	<meta property="og:title" content="<?php echo $servicecode; ?> API"/>
	<meta property="og:type" content="<?php echo strtolower($servicecode); ?>-api"/>
	<!-- AddThis Smart Layers BEGIN -->
	<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f9a1c208996c1d"></script>
	<script type="text/javascript">
	  addthis.layers({
		'theme' : 'transparent',
		'share' : {
		  'position' : 'right',
		  'numPreferredServices' : 6
		}, 
		'follow' : {
		  'services' : [
			{'service': 'twitter', 'id': 'ChronolabsCoop'},
			{'service': 'twitter', 'id': 'Cipherhouse'},
			{'service': 'twitter', 'id': 'OpenRend'},
			{'service': 'facebook', 'id': 'Chronolabs'},
			{'service': 'linkedin', 'id': 'founderandprinciple'},
			{'service': 'google_follow', 'id': '105256588269767640343'},
			{'service': 'google_follow', 'id': '116789643858806436996'}
		  ]
		},  
		'whatsnext' : {},  
		'recommended' : {
		  'title': 'Recommended for you:'
		} 
	  });
	</script>
	<!-- AddThis Smart Layers END -->
</head>
<?php $number = mt_rand(2,5); ?>
<body>
<div class="main">
    <h1><?php echo $servicename; ?> (<?php echo $servicecode; ?>) Open API || Chronolabs Cooperative (Sydney, Australia)</h1>
    <p>This is an API Service for conducting a screening placement of people, animals or entities for example for drugs, virus or toxin testing. It provides the selection based on either a generated seed or provided one, in reference to the array posted to the API by either GET or POST method of form REST API Posting.</p>
	<h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>Examples of Calls (Using JSON)</h2>
    <p>There is a couple of calls to the API which I will explain.</p>
    <blockquote>For example if you want a call without providing a seed a short handed 400 character length GET method would be returning <?php echo $number; ?> items from the selection of the array :: <a href="<?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a> or in providing a seed which is a numeric or double floating point/real variable you would do the following :: <a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a>.<br /><br />You don't have to use the variable name 'person' it just has to be a variable passed to the API through GET or POST that is a one element array, the keys will be preserved and returned incase you want to place elements based on employment numbers with names and you can call the variable what you need, the API will detect the variable which is an array passed to it.</blockquote>
    <h2>Code API Documentation</h2>
    <p>You can find the phpDocumentor code API documentation at the following path :: <a href="<?php echo $source; ?>docs/" target="_blank"><?php echo $source; ?>docs/</a>. These should outline the source code core functions and classes for the API to function!</p>
    <h2>RAW Document Output</h2>
    <p>This is done with the <em>raw.api</em> extension at the end of the url, you replace the example address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/raw.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>HTML Document Output</h2>
    <p>This is done with the <em>html.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/html.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>Serialisation Document Output</h2>
    <p>This is done with the <em>serial.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/serial.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>JSON Document Output</h2>
    <p>This is done with the <em>json.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
    <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/json.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <h2>XML Document Output</h2>
    <p>This is done with the <em>xml.api</em> extension at the end of the url, you replace the address with either a place, an country either with no spaces in words or country ISO2 or ISO3 code and a name to search for the place on the api</p>
        <blockquote>
        <font color="#009900">This is for a <?php echo $number; ?> items returned with a generated seed</font><br/>
        <em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em><br /><br />
		<font color="#009900">This is for <?php echo $number; ?> items return with a provided seed of <em>'<?php echo $seed?>'</em></font><br/>
        <em><strong><em><strong><a href="<?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson" target="_blank"><?php echo $source; ?>v1/<?php echo $number; ?>/<?php echo $seed;?>/xml.api?person[E0001]=Sam%20Wrought&person[KID69]=Andrew%20Psalia&person[E0002]=Frank%20Darcey&person[A0001]=Nicholas%20Moore&person[B0001]=Jodie%20Coleman&person[C0002]=Roger%20Essig&person[D0004]=Gary%20Arthy&person[F0007]=Emma%20Quine&person[G000X]=Martin%20Ohlson</a></strong></em>
    </blockquote>
    <?php if (file_exists($fionf = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'apis-labs.coop.html')) {
    	readfile($fionf);
    }?>	
   <h2>Limits</h2>
    <p>There is a limit of <?php echo MAXIMUM_QUERIES; ?> queries per hour. This will reset every hour and the response of a 404 document not found will be provided if you have exceeded your query limits. You can add yourself to the whitelist by using the following form API <a href="https://whitelist.labs.coop/">Whitelisting form</a>. This is only so this service isn't abused!!</p>
    <h2>The Author</h2>
    <p>This was developed by Simon Roberts in 2014 and is part of the Chronolabs System and Xortify and offering on-going support to existing libraries. if you need to contact simon you can do so at the following address <a href="mailto:wishcraft@users.sourceforge.net">wishcraft@users.sourceforge.net</a></p></body>
</div>
</html>
<?php 
