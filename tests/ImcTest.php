<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Client;

class ImcTest extends TestCase
{
    /**
     * @dataProvider getClient
     */
    public function testImc(Client $client, float $expectedImc, string $expectedImcAnalyze): void
    {
        $imc = (float) number_format($client->getImc(), 2, '.', ',');
        self::assertEquals($expectedImc, $imc);
        self::assertEquals($expectedImcAnalyze, $client->imcAnalyze());
    }

    public function getClient(): array
    {
        return [
            'underWeightClient' => [
                new Client('Gilberto', '2021-06-10', 10, 1.02, 'M'), 
                9.61, 
                'under weight'
            ],
            'normalClient' => [
                new Client('Talitha', '1985-12-25', 70, 1.68, 'F'),
                24.80,
                'normal'
            ],
            'overweightClient' => [
                new Client('Marcelo', '1988-12-25', 84.5, 1.77, 'M'),
                26.97,
                'overweight'
            ]
        ];
    }
}