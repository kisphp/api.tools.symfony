<?php

namespace Test\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllersTest extends WebTestCase
{
    /**
     * @param string $url
     *
     * @dataProvider urlsProvider
     */
    public function testPages($url)
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $message = sprintf('Url %s is not functional', $url);
        $this->assertTrue($client->getResponse()->isSuccessful(), $message);
    }

    /**
     * @return array
     */
    public function urlsProvider()
    {
        return [
            ['/'],
            ['/convert/json'],
            ['/convert/base64'],
            ['/convert/serialized'],
            ['/responsive'],
            ['/markdown-parser'],
        ];
    }
}