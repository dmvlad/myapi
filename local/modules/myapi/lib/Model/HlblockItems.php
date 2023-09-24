<?php

namespace Bitrix\Myapi\Model;

final class HlblockItems implements \JsonSerializable
{
	private int $id;
	private array $filter = [];
	private array $select = ['*'];
	private int $offset = 0;


	public function __construct(int $id = 5, array $filter = [], array $select = ['*'], int $offset = 0)
	{
		$this->id = $id;
		$this->filter = $filter;
		$this->select = $select;
		$this->offset = $offset;
	}

	public function jsonSerialize(): array
	{
		return array_filter([
			'id' => $this->id,
			'filter' => $this->filter,
			'select' => $this->select,
			'offset' => $this->offset,
		]);
	}
}

?>