<?php
/**
 * User: russ
 * Date: 19/10/2018
 * Time: 09:43
 */


use GuzzleHttp\Psr7\Response;
use Infiny\Applications\Clx\Models\Service;
use Infiny\Applications\Clx\Models\Port;
use Infiny\Applications\Clx\Models\Slot;
use Infiny\Applications\Clx\Models\Shelf;

class TestService extends MockApi
{
    public function testServiceModel()
    {
        $this->mockHandler->append(new Response(200, [], file_get_contents(__DIR__ . '/json/Service.json')));

        $service = $this->apiClient->getService(1234);

        $this->assertInstanceOf(Service::class, $service);
        $this->assertInstanceOf(Port::class, $service->getPort());
        $this->assertInstanceOf(Shelf::class, $service->getPort()->getShelf());
        $this->assertInstanceOf(Slot::class, $service->getPort()->getSlot());
        $this->assertInstanceOf(Port::class, $service->getBPort());

    }
}