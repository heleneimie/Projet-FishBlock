<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/add');
    }

    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/update');
    }

    public function testCheckuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/check');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/user/remove');
    }

}
