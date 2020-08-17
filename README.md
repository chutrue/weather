<h1 align="center"> Weather </h1>

<p align="center"> 基于 <a target="_blank" href="https://lbs.amap.com/api/webservice/guide/api/weatherinfo">高德开放平台</a> 的 PHP 天气信息组件。</p>

[![Build Status](https://travis-ci.org/chutrue/weather.svg?branch=master)](https://travis-ci.org/chutrue/weather)
[![Latest Stable Version](https://poser.pugx.org/chutrue/weather/v)](//packagist.org/packages/chutrue/weather) [![Total Downloads](https://poser.pugx.org/chutrue/weather/downloads)](//packagist.org/packages/chutrue/weather) [![Latest Unstable Version](https://poser.pugx.org/chutrue/weather/v/unstable)](//packagist.org/packages/chutrue/weather) [![License](https://poser.pugx.org/chutrue/weather/license)](//packagist.org/packages/chutrue/weather)

## Installing

```shell
composer require chutrue/weather -vvv
```

## Usage

### 使用
```shell
<?php

use Chutrue\Weather\Weather;

$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
$weather = new Weather($key);
```

### 获取实时天气

```shell
$response = $weather->getLiveWeather('深圳');
```

示例

```shell
{
    "status": "1",
    "count": "1",
    "info": "OK",
    "infocode": "10000",
    "lives": [
        {
            "province": "广东",
            "city": "深圳市",
            "adcode": "440300",
            "weather": "中雨",
            "temperature": "27",
            "winddirection": "西南",
            "windpower": "5",
            "humidity": "94",
            "reporttime": "2018-08-21 16:00:00"
        }
    ]
}
```

### 获取天气预报

```shell
$response = $weather->getForecastsWeather('深圳');
```

示例

```shell
{
  "status": "1",
  "count": "1",
  "info": "OK",
  "infocode": "10000",
  "forecasts": [
    {
      "city": "深圳市",
      "adcode": "440300",
      "province": "广东",
      "reporttime": "2020-08-15 13:52:09",
      "casts": [
        {
          "date": "2020-08-15",
          "week": "6",
          "dayweather": "阵雨",
          "nightweather": "阵雨",
          "daytemp": "32",
          "nighttemp": "27",
          "daywind": "东南",
          "nightwind": "东南",
          "daypower": "≤3",
          "nightpower": "≤3"
        },
        {
          "date": "2020-08-16",
          "week": "7",
          "dayweather": "阵雨",
          "nightweather": "阵雨",
          "daytemp": "31",
          "nighttemp": "28",
          "daywind": "东南",
          "nightwind": "东南",
          "daypower": "≤3",
          "nightpower": "≤3"
        },
        {
          "date": "2020-08-17",
          "week": "1",
          "dayweather": "阵雨",
          "nightweather": "阵雨",
          "daytemp": "32",
          "nighttemp": "27",
          "daywind": "东南",
          "nightwind": "东南",
          "daypower": "≤3",
          "nightpower": "≤3"
        },
        {
          "date": "2020-08-18",
          "week": "2",
          "dayweather": "阵雨",
          "nightweather": "阵雨",
          "daytemp": "32",
          "nighttemp": "27",
          "daywind": "东南",
          "nightwind": "东南",
          "daypower": "≤3",
          "nightpower": "≤3"
        }
      ]
    }
  ]
}
```

参数说明

```shell
$response = $weather->getLiveWeather($city,$format='json');
$response = $weather->getForecastsWeather($city,$format='json');
```

- `$city` - 城市名，比如：“深圳”
- `$format` - 格式化输出类型json/xml  默认：json

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/chutrue/weather/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/chutrue/weather/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
