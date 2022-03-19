<?php

namespace App\traits;

trait Rcq
{
    public float $waist;
    public float $hip;

	public function getRcq(): float
	{
        if ($this->hip == 0) {
            throw new \DivisionByZeroError('Division by zero');
        }

		return $this->waist / $this->hip;
	}

	public function rcqAnalyze(): string
	{
		$rcq = $this->getRcq();

        if ($this->gender == 'F') {
            if ($rcq <= 0.8) {
                return 'low health risk';
            } elseif (($rcq >= 0.81) && ($rcq <= 0.85)) {
                return 'moderate health risk';
            } else {
                return 'high health risk';
            }
        } else {
            if ($rcq <= 0.95) {
                return 'low health risk';
            } elseif (($rcq >= 0.96) && ($rcq <= 1)) {
                return 'moderate health risk';
            } else {
                return 'high health risk';
            }
        }
	}
}
