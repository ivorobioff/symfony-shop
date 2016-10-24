<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertNotEmpty($crawler->filter('.top-bar-left li')->count());
        $this->assertNotEmpty($crawler->filter('.top-bar-right li')->count());
        $this->assertNotEmpty($crawler->filter('.footer li')->count());
    }

    public function testStaticPages()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/about');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('About Us', $crawler->filter('h1')->text());

        $crawler = $client->request('GET', '/customer-service');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Customer Service', $crawler->filter('h1')->text());

        $crawler = $client->request('GET', '/privacy-and-cookie-policy');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Privacy and Cookie Policy', $crawler->filter('h1')->text());

        $crawler = $client->request('GET', '/orders-and-returns');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Orders and Returns', $crawler->filter('h1')->text());

        $crawler = $client->request('GET', '/contact-us');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Contact Us', $crawler->filter('h1')->text());
        $this->assertNotEmpty($crawler->filter('form')->count());
    }

    public function testContactFormSubmit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contact-us');

        $form = $crawler->selectButton('Reach Out!')->form();

        $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
