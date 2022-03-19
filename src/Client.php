<?php

declare(strict_types=1);

namespace App;

use App\traits\Imc;
use App\traits\Rcq;

class Client
{
	use Imc, Rcq;

	public string $name;
	public string $birthDate;
	public ?string $email = null;
	public float $weight;
	public float $stature;
	public string $gender;

	public function __construct(string $name, string $birthDate, float $weight, float $stature, string $gender)
	{
		$this->name = $name;
		$this->birthDate = date('Y-m-d', strtotime($birthDate));
		$this->weight = $weight;
		$this->stature = $stature;
		$this->gender = strtoupper($gender);
	}

	public function getYearsOld(): int
	{
		list($year, $month, $day) = explode('-', $this->birthDate);
		$yearsOld = date('Y') - $year;

		if ((date('m') < $month) || ((date('m') == $month) && (date('d') <= $day))) {
			$yearsOld -= 1;
		}

		return $yearsOld;
	}

	public function getGenderName(): string
	{
		if (($this->gender !== 'F') && ($this->gender !== 'M')) {
			throw new \ErrorException('Unknown genre');
		}

		$gender = ['F' => 'Female', 'M' => 'Male'];

		return $gender[$this->gender];
	}
}

