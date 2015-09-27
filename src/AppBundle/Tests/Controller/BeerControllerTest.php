<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BeerControllerTest extends WebTestCase
{
    public function testHlavni()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hlavni');
    }

}
