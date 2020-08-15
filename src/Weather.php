<?php

namespace Chutrue\Weather;

use Chutrue\Weather\Exceptions\HttpException;
use Chutrue\Weather\Exceptions\InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Weather
 *
 * @package Chutrue\Weather
 */
class Weather
{
    protected $key;
    protected $guzzleOptions = [];

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param  mixed   $city
     * @param  string  $type
     * @param  string  $format
     *
     * @return mixed|string
     * @throws HttpException
     * @throws InvalidArgumentException
     * @throws GuzzleException
     */
    public function getWeather($city, string $type = 'base', string $format = 'json')
    {
        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';

        if (!\in_array(\strtolower($format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid response format: ' . $format);
        }

        if (!\in_array(\strtolower($type), ['base', 'all'])) {
            throw new InvalidArgumentException('Invalid type value(base/all): ' . $type);
        }

        $query = \array_filter([
            'key'        => $this->key,
            'city'       => $city,
            'output'     => $format,
            'extensions' => $type,
        ]);

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();

            return 'json' === $format ? \json_decode($response, true) : $response;
        } catch (\Exception $exception) {
            throw new HttpException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * 获取实况天气
     *
     * @param  mixed   $city
     * @param  string  $format
     *
     * @return mixed|string
     * @throws GuzzleException
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getLiveWeather($city, $format = 'json')
    {
        return $this->getWeather($city, 'base', $format);
    }

    /**
     * 获取预报天气
     *
     * @param  mixed   $city
     * @param  string  $format
     *
     * @return mixed|string
     * @throws GuzzleException
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function getForecastsWeather($city, $format = 'json')
    {
        return $this->getWeather($city, 'all', $format);
    }

    /**
     * 获取客户端实例
     *
     * @return Client
     */
    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    /**
     * 设置客户端配置
     *
     * @param  array  $options
     */
    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }
}
