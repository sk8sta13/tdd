<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\Client;

class ClientTest extends TestCase
{
    public function testNoGender()
    {
        $this->expectException(\ErrorException::class);
        $this->expectExceptionMessage('Unknown genre');
        
        $client = new Client('client', '2021-06-10', 10, 1.02, 'Y');
        $gender = $client->getGenderName();
    }

    /**
     * @dataProvider getClient
     */
    public function testYearsOld(Client $client, float $expectedYearsOld, string $expectedGenderName): void
    {
        self::assertEquals($expectedYearsOld, $client->getYearsOld());
        self::assertEquals($expectedGenderName, $client->getGenderName());
    }

    public function getClient(): array
    {
        return [
            'babyClient' => [
                new Client('Gilberto', '2021-06-10', 10, 1.02, 'M'), 
                0,
                'Male'
            ],
            'womanClient' => [
                new Client('Talita', '1985-12-25', 70, 1.68, 'F'),
                36,
                'Female'
            ],
            'maleClient' => [
                new Client('Marcelo', '1988-12-25', 84.5, 1.77, 'M'),
                33,
                'Male'
            ]
        ];
    }
}