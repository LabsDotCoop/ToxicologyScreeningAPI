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

	global $seed;
	
	define('MAXIMUM_QUERIES', 35);
	ini_set('memory_limit', '128M');
	//include dirname(dirname(dirname(__FILE__))).'/web/public_html/mainfile.php';
	include dirname(__FILE__).'/functions.php';
	error_reporting(E_ERROR);

	if (isset($_GET['seed'])) {
		$seed = trim($_GET['seed']);
	} else {
		$parts = explode('.', microtime(true));
		$seed = ((float)(mt_rand(0,1)==1?'':'-').$parts[1].'.'.$parts[0]) / sqrt((float)$parts[1].'.'.intval(cosh($parts[0])))*tanh($parts[1]) * mt_rand(1, intval($parts[0] / $parts[1]));
	}
	
	header('Context-seed: '. $seed);
	
	$help=false;
	if ((!isset($_GET['selected']) || empty($_GET['selected']))) {
		$help=true;
	} elseif (isset($_GET['selected']) && !empty($_GET['selected'])) {
		$output = trim($_GET['output']);
		$numselected = intval($_GET['selected']);
		foreach($_REQUEST as $key => $value) {
			if (is_array($value)) {
				$persons = $value;
				continue;
			}
		}		
	} else {
		$help=true;
	}
	
	if ($help==true) {
		http_response_code(400);
		include dirname(__FILE__).'/help.php';
		exit;
	}
	http_response_code(200);
	$data = selectPeople($persons, $output, $numselected, $seed);
	switch ($output) {
		default:
			echo '<h1>Number selected for screening: ' . $numselected . '</h1>';
			echo '<pre style="font-family: \'Courier New\', Courier, Terminal; font-size: 0.77em;">';
			echo $data;
			echo '</pre>';
			break;
		case 'raw':
			echo "{ '". implode("' } { '", $data) . "' }";
			break;
		case 'json':
			header('Content-type: application/json');
			echo json_encode($data);
			break;
		case 'serial':
			header('Content-type: text/html');
			echo serialize($data);
			break;
		case 'xml':
			header('Content-type: application/xml');
			$dom = new XmlDomConstruct('1.0', 'utf-8');
			$dom->fromMixed(array('root'=>$data));
 			echo $dom->saveXML();
			break;
	}
?>
		