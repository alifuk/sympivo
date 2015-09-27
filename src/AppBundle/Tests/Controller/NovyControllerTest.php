<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NovyControllerTest extends WebTestCase
{
    public function testTestik()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/testik');
    }

}
