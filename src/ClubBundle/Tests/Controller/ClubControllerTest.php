<?php

namespace ClubBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClubControllerTest extends WebTestCase
{
    public function testRead()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/read');
    }

    public function testCreat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/creat');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/update');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/delete');
    }

}
