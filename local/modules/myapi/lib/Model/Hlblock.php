<?php

namespace Bitrix\Myapi\Model;

final class Hlblock implements \JsonSerializable
{
	private int $id;
	private float $summ;

	public function __construct(int $id, float $summ = 0)
	{
		$this->id = $id;
		$this->summ = $summ;
	}

	public function jsonSerialize(): array
	{
		return array_filter([
			'id' => $this->id,
			'summ' => $this->summ,
		]);
	}
}