<?php
namespace Bitrix\Myapi\Filter;

use Bitrix\Main\Context;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Error;
use Bitrix\Main\Event;
use Bitrix\Main\EventResult;

class CheckDataType extends ActionFilter\Base
{
	private $allowed = [
		'application/json',
		'application/xml',
	];

	public function onBeforeAction(Event $event): ?EventResult
	{
		$sent = $this->getAction()->getController()->getRequest()->getHeaders()->getContentType();
		
		if (!$sent || !$this->isAllowed($sent))	{
			$this->addError(new Error("Sent data type ".htmlspecialchars($sent)." not allowed."));

			return new EventResult(EventResult::ERROR, null, null, $this);
		}

		return null;
	}

	private function isAllowed(string $data): bool
	{
		foreach ($this->allowed as $f) {
			if ($f == $data) {
				$this->setActionConfig(['datatype' => $data]);
				//die($data);				
				return true;
			}
		}

		return false;
	}
}