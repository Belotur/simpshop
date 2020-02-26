<?php


namespace backend\models\views;


class StatisticsViewModel
{
	/** @var int */
	private $usersCount;

	/** @var int */
	private $adminsCount;

	/**
	 * StatisticsViewModel constructor.
	 *
	 * @param int $usersCount
	 * @param int $adminsCount
	 */
	public function __construct(int $usersCount, int $adminsCount)
	{
		$this->usersCount = $usersCount;
		$this->adminsCount = $adminsCount;
	}

	/**
	 * @return int
	 */
	public function getUsersCount(): int
	{
		return $this->usersCount;
	}

	/**
	 * @return int
	 */
	public function getAdminsCount(): int
	{
		return $this->adminsCount;
	}
}
