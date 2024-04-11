# Php-Holiday-Package
A Dynamic Holiday package for Php/ Laravel based on `Google Calendar API`

    composer require san103/php-holiday-api

<h1>Prerequisites</h1>

- [x] PHP 8.0 or higher
- [x] Composer
- [x] Guzzlehttp/guzzle"

# Installation
```
composer install
```
```
composer require guzzlehttp/guzzle:^7.0
```

# Basic Usage


<h2> Define package </h2>

```
namespace App/YourApp

use San103\Phpholidayapi\HolidayClient;
```

```
$holiday = new HolidayClient();
```

- [ ] (Optional) Set your Country Code e.g uk for United Kindom, us for United State `default sets to Philippines`
```
countryCode('uk')
```

- [ ] (Optional) Set Year you want to display the holiday dates , `default is set to current year which is 2023`
```
year('2022')
```

> [!IMPORTANT]
> > The `result()` must define in last chain.
```
result(); 
```

- [x] Example usage in php
```
require 'vendor/autoload.php';
use San103\Phpholidayapi\HolidayClient;

public function index(){

        $api = new HolidayClient();
        return $api
                    ->countryCode('uk') 
                    ->year('2023') 
                    ->result();
      
    }
```

- [x] Example usage in Laravel 10
```
use San103\Phpholidayapi\HolidayClientLaravel;

public function index(){

        $api = new HolidayClientLaravel();
        return $api
                    ->countryCode('uk') 
                    ->year('2023') 
                    ->result();
      
    }
```
<h3>Special Feature for Laravel 10</h3>

- Install Cache 
- use the HolidayClientLaravel source
  
```
 return Cache::remember(date('Y'), now()->addMonth(), function () use ($http) {
```
change the `now()->addMonth()` to set expiration of the cache

> [!NOTE]
> You may also provide your own Api key from [Google API](https://developers.google.com/calendar/api/guides/overview).
>  just enable the Calendar Api and generate key
```
apiKey('your-api-key')
```

<h2>Output</h2>

```
"
{
    "21":{
        "id":"20230101_i536",
        "title":"New Year\'s Day",
        "description":"Public holiday",
        "date":{"date":"2023-01-01"}},

    "23":{
        "id":"20230225_qh5n",
        "title":"People Power Anniversary",
        "description":"Public holiday",
        "date":{"date":"2023-02-25"}},

    "24":{
        "id":"20230406_hvi",
        "title":"Maundy Thursday",
        "description":"Public holiday",
        "date":{"date":"2023-04-06"}},

    "25":{
        "id":"20230407_fv",
        "title":"Good Friday",
        "description":"Public holiday",
        "date":{"date":"2023-04-07"}},

    "26":{
        "id":"20230408_6v",
        "title":"Black Saturday",
        "description":"Public holiday",
        "date":{"date":"2023-04-08"}},

    "28":{
        "id":"20230501_on",
        "title":"Labor Day",
        "description":"Public holiday",
        "date":{"date":"2023-05-01"}},

    "29":{
        "id":"20230612_kq",
        "title":"Independence Day",
        "description":"Public holiday",
        "date":{"date":"2023-06-12"}},

    "30":{
        "id":"20230821_p0c",
        "title":"Ninoy Aquino Day",
        "description":"Public holiday",
        "date":{"date":"2023-08-21"}},
    ...
"
```
> [!IMPORTANT]
> Give as a star mate! Thank you and GodBless
## License

The package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


