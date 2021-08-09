<?php

use App\Http\Controllers\VideoController;
use App\Services\VideoService;
use Illuminate\Http\Request;

class VideosTest extends TestCase
{
    public function testRouteIndexSuccess()
    {
        $videoController = new VideoController(new VideoService);
        $index = $videoController->index(new Request());

        $this->assertEquals(200, $index->getStatusCode());
    }

    public function testRouteStoreSuccess()
    {
        $videoController = new VideoController(new VideoService);
        $store = $videoController->store(new Request([
            "title" => "new12435343",
            "description" => "new125345343",
            "url" => "http://teste.com153453423",
        ]));

        $this->assertEquals(201, $store->getStatusCode());
    }

    public function testRouteStoreFail()
    {
        $videoController = new VideoController(new VideoService);
        $store = $videoController->store(new Request([
            "title" => "new",
            "description" => "new",
            "url" => "http://teste.com",
        ]));

        $this->assertEquals(422, $store->getStatusCode());
    }

    public function testRouteShowSuccess()
    {
        $videoController = new VideoController(new VideoService);
        $show = $videoController->show(2);

        $this->assertEquals(200, $show->getStatusCode());
    }

    public function testRouteShowFail()
    {
        $videoController = new VideoController(new VideoService);
        $show = $videoController->show(3);

        $this->assertEquals(404, $show->getStatusCode());
    }

    public function testRouteUpdateSuccess()
    {
        $videoController = new VideoController(new VideoService);
        $update = $videoController->update(6, new Request([
            "title" => "new123445245",
            "description" => "new12345454",
            "url" => "http://teste.com12344545454",
        ]));

        $this->assertEquals(200, $update->getStatusCode());
    }

    public function testRouteUpdateFail()
    {
        $videoController = new VideoController(new VideoService);
        $update = $videoController->update(1, new Request([
            "title" => "new123",
            "description" => "new123",
            "url" => "http://teste.com123",
        ]));

        $this->assertEquals(404, $update->getStatusCode());
    }

    public function testRouteDestroySuccess()
    {
        $videoController = new VideoController(new VideoService);
        $destroy = $videoController->destroy(9);

        $this->assertEquals(200, $destroy->getStatusCode());
    }

    public function testRouteDestroyFail()
    {
        $videoController = new VideoController(new VideoService);
        $destroy = $videoController->destroy(1);

        $this->assertEquals(404, $destroy->getStatusCode());
    }
}
