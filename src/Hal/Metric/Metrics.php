<?php
namespace Hal\Metric;

/**
 * Class Metrics
 * @package Hal\Metric
 */
class Metrics implements \JsonSerializable
{

    /**
     * @var array
     */
    private $data = [];

    /**
     * @param $metric
     * @return $this
     */
    public function attach($metric)
    {
        $this->data[$metric->getName()] = $metric;
        return $this;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        return $this->has($key) ? $this->data[$key] : null;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    function jsonSerialize()
    {
        return $this->all();
    }
}