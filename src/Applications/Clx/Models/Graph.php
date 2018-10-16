<?php
/**
 * User: russ
 * Date: 16/10/2018
 * Time: 10:40
 */

namespace Infiny\Applications\Clx\Models;


use Infiny\Client\BaseResponse;

class Graph extends BaseResponse
{
    private $graph;

    /**
     * @return mixed
     */
    public function getGraph()
    {
        return base64_decode($this->graph);
    }

    /**
     * @param mixed $graph
     * @return Graph
     */
    public function setGraph($graph)
    {
        $this->graph = $graph;
        return $this;
    }
}