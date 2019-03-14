<?php

namespace ApplicationTest\Service;

use Application\Service\Repository\UserRepository;
use Application\Service\Http\ClientInterface;
use Application\Entity\User;
use ApplicationTest\Helper\CreateGuzzleMockTrait;
use GuzzleHttp\Exception\RequestException;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{

    use CreateGuzzleMockTrait;

    protected $repository;

    protected function setUp(): void
    {
        $guzzle = $this->getGuzzleMock();
        $url = 'http://hiring.rewardgateway.net';
        $client = $this->getMockForAbstractClass(ClientInterface::class);
        $client->expects($this->any())
            ->method('getAll')
            ->will($this->returnCallback(function () use ($guzzle, $url) {
                $response = $guzzle->get($url.'/list');
                if ($response) {
                    return (array) json_decode($response->getBody().'', true);
                } else {
                    return [];
                }
            }));

        $this->repository = new UserRepository($client);
    }

    public function testGetAll()
    {
        $testResult1 = $this->repository->getAll();
        $this->assertTrue(is_array($testResult1));
        $this->assertEquals(5, count($testResult1));
        $this->assertInstanceOf(User::class, $testResult1[0]);

        $testResult2 = $this->repository->getAll();
        $this->assertTrue(is_array($testResult2));
        $this->assertEquals(0, count($testResult2));

        $testResult3 = $this->repository->getAll();
        $this->assertTrue(is_array($testResult3));
        $this->assertEquals(0, count($testResult3));

        $this->expectException(\Exception::class);
        $this->repository->getAll();
    }
}
