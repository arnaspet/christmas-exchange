<?php
namespace ArnasPet\ChristmasExchange\Test\Service;

use ArnasPet\ChristmasExchange\Service\EmailRandomizer;

class EmailRandomizerTest extends \PHPUnit_Framework_TestCase
{
    public function testAddRandomReceiversToSenders()
    {
        $data = [
            [
                'name' => 'Arnas Petruškevičius',
                'email' => 'arnas.petruskevicius@yahoo.com'
            ],
            [
                'name' => 'Kostas',
                'email' => 'kosts@gmail.com'
            ],
            [
                'name' => 'Santa',
                'email' => 'santa@gmail.com'
            ]
        ];
        $randomizer = new EmailRandomizer();

        $result = $randomizer->addRandomReceiversToSenders($data);
        foreach ($result as $sender) {
            $this->assertNotSame($sender['email'], $sender['receiver']['email']);
        }
    }
}
