<?php

namespace App\traits;

trait Imc
{
	public function getImc(): float
	{
		return $this->weight / pow($this->stature, 2);
	}

	public function imcAnalyze(): String
	{
		$imc = $this->getImc();

		if ($imc < 18.5) {
			return 'under weight';
		} elseif (($imc >= 18.5) && ($imc <= 24.9)) {
			return 'normal';
		} elseif (($imc >= 25) && ($imc <= 29.9)) {
			return 'overweight';
		} elseif (($imc >= 30) && ($imc <= 39.9)) {
			return 'obesity';
		} else {
			return 'severe obesity';
		}
	}
}
