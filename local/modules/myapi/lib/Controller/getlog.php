<?php
namespace Bitrix\Myapi\Controller;

use Bitrix\Main\Application;
use Bitrix\Main\Engine\Action;
use Bitrix\Main\Engine\ActionFilter\HttpMethod;
use Bitrix\Main\Engine\ActionFilter\ContentType;
use Bitrix\Main\Engine\AutoWire\ExactParameter;
//use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\JsonController;
use Bitrix\Main\Engine\JsonPayload;
use Bitrix\Main\Error;
use Bitrix\Main\HttpResponse;
use Bitrix\Main\Response;
use Bitrix\Myapi\Items;
use Bitrix\Myapi\Model;
use Bitrix\Myapi\Tools;
use Bitrix\Myapi\Filter;


class Getlog extends \Bitrix\Main\Engine\Controller
{

    public function configureActions()
	{
		return [
			'getLog'	=> [
				'prefilters' => [
					new Filter\LocalSubnet(),
				],
			],
		];
	}


	public function getLogAction(int $id) 
	{

		$item = Items::getLog($id);

		if (!$item)
		{
			$this->addError(new Error('The element '.$id.' is not found'));
			return null;
		}

		return $item;
	}


	public function getAutoWiredParameters(): array
	{

		return [
			new ExactParameter(
				Model\Hlblock::class,
				'hlblock',
				function ($className, int $id) {

					/*
					 * если нужна отладка
					Tools\Log::add([
							'className' => $className,
							'jsonparams' => $jsonParams, 
							'class_methods' => get_class_methods($jsonParams)
						], 'autowired'
					);
					*/

					$hlblock = new Model\Hlblock($id);
					return $hlblock;
				}
			),
		];

	}




 }
 ?>