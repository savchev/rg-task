<?php

namespace ApplicationTest\Service;

use Application\Service\Http\GuzzleWrapper;
use ApplicationTest\Helper\CreateGuzzleMockTrait;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;

class GuzzleWrapperTest extends TestCase
{

    use CreateGuzzleMockTrait;

    protected $service;

    protected function setUp(): void
    {
        $guzzle = $this->getGuzzleMock();
        $url = 'http://hiring.rewardgateway.net';
        $this->client = new GuzzleWrapper($guzzle, $url);
    }

    public function testGetAll()
    {
        $testResult1 = $this->client->getAll();
        $this->assertTrue(is_array($testResult1));
        $this->assertEquals(5, count($testResult1));

        $testResult2 = $this->client->getAll();
        $this->assertTrue(is_array($testResult2));
        $this->assertEquals(0, count($testResult2));

        $testResult3 = $this->client->getAll();
        $this->assertTrue(is_array($testResult3));
        $this->assertEquals(0, count($testResult3));

        $this->expectException(RequestException::class);
        $this->client->getAll();
    }
}
