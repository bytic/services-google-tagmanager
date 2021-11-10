<?php

namespace ByTIC\GoogleTagManager\Data;

use Nip\Utility\Arr;

/**
 * Class DataLayer
 * @package ByTIC\GoogleTagManager
 */
class DataLayer
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * DataLayer constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Add data to the data layer. Supports dot notation.
     * Inspired by laravel's config repository class.
     *
     * @param array|string $key
     * @param mixed $value
     */
    public function set($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $innerKey => $innerValue) {
                Arr::set($this->data, $innerKey, $innerValue);
            }

            return;
        }

        Arr::set($this->data, $key, $value);
    }

    public function push($value)
    {
        array_push($this->data, $value);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }

    /**
     * Empty the data layer.
     */
    public function clear()
    {
        $this->data = [];
    }

    /**
     * Return an array representation of the data layer.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * @param string $command
     * @return string
     */
    public function toStringCommand($command = 'dataLayer.push'): string
    {
        $return = [];
        foreach ($this->data as $value) {
            $encodedValue = trim(static::encode($value), '[]');
            $return[] = $command . '(' . $encodedValue . ');';
        }
        return implode("\n", $return);
    }

    /**
     * Return a json representation of the data layer.
     *
     * @return string
     */
    public function toJson()
    {
        return self::encode($this->data);
    }

    /**
     * @param $value
     * @return string
     */
    public static function encode($value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
