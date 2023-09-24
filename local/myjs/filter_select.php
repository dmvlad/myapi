<?php
defined('B_PROLOG_INCLUDED') || die;

global $APPLICATION;
//CModule::IncludeModule("crm");
use \Bitrix\Main\Page\Asset;

CJSCore::RegisterExt(
	'filter_select',
	array(
		'js' => '/local/myjs/js/filter_select.js',
		'lang' => '/local/myjs/lang/' . LANGUAGE_ID . '/filter_select.js.php',
		'css' => '/local/myjs/css/filter_select.css',
		'rel' => array('ajax', 'popup', 'jquery')
	)
);

CJSCore::Init('filter_select'); 

$fieldName = 'TYPE_ID';
$spTypeId = 141;

// https://crm.cb.bx24.pro/crm/deal/details/12/

if(str_contains($APPLICATION->GetCurPage(), "crm/deal/details/")){
	$asset = Asset::getInstance();
	$asset->addString('<script>BX.ready(function () { BX.FilterSelect.typeOfWork();});</script>');
}

?>