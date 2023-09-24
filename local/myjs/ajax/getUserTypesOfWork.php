<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$getData = ($_GET['data']) ?? 'FIELD';
$results = ['qwerty' => 'Yes it is'];
/*
$elements = \Bitrix\Iblock\Elements\ElementTypesofworkTable::getList([
	'order' => array('SORT' => 'asc'),
	'select' => ['ID', 'NAME'],
	'filter' => ['=ACTIVE' => 'Y', '%CENTER.VALUE' => $getData],
])->fetchAll();
foreach ($elements as $element) {
    $results[] = array(
    	'ID' => $element['ID'], 
    	'NAME' => $element['NAME']
    );
}
*/
echo \Bitrix\Main\Web\Json::encode($results);