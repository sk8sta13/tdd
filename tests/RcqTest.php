<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Client;

class RcqTest extends TestCase
{
    public function testRcqHipZero()
    {
        $this->expectException(\DivisionByZeroError::class);
        $this->expectExceptionMessage('Division by zero');
        
        $Gilberto = new Client('Gilberto', '2021-06-10', 10, 1.02, 'M');
        $Gilberto->waist = 0.33;
        $Gilberto->hip = 0;
        $rcq = $Gilberto->getRcq();
    }

    /**
     * @dataProvider getClient
     */
    public function testRcq(Client $client, float $expectedRcq, string $expectedRcqAnalyze): void
    {
        $rcq = (float) number_format($client->getRcq(), 2, '.', ',');
        self::assertEquals($expectedRcq, $rcq);
        self::assertEquals($expectedRcqAnalyze, $client->rcqAnalyze());
    }

    public function getClient(): array
    {
        $Gilberto = new Client('Gilberto', '2021-06-10', 10, 1.02, 'M');
        $Gilberto->waist = 0.33;
        $Gilberto->hip = 0.36;

        $Talitha = new Client('Talitha', '1985-12-25', 70, 1.68, 'F');
        $Talitha->waist = 0.5;
        $Talitha->hip = 0.6;

        $Marcelo = new Client('Marcelo', '1988-12-25', 84.5, 1.77, 'M');
        $Marcelo->waist = 0.68;
        $Marcelo->hip = 0.6;

        return [
            'lowHealthRiskClient' => [
                $Gilberto, 
                0.92, 
                'low health risk'
            ],
            'moderateHealthRiskClient' => [
                $Talitha,
                0.83,
                'moderate health risk'
            ],
            'highHealthRiskClient' => [
                $Marcelo,
                1.13,
                'high health risk'
            ]
        ];
    }
}