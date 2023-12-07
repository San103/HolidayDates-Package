# Php-Holiday-API
An API for php holiday date based on `Google Calendar API`

    composer require san103/php-holiday-api

<h1>Prerequisites</h1>

- [x] PHP 7.2.5
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

- [ ] Set your Country Code e.g uk for United Kindom, us for United State `default sets to Philippines`
```
countryCode('uk')
```

- [ ] Set Year you want to display the holiday dates , `default is set to current year which is 2023`
```
year('2022')
```

> [!CAUTION]
> > The `result()` must define in last chain.
```
result(); 
```

- [x] Code
```
use San103\Phpholidayapi\HolidayClient;

public function index(){

        $api = new HolidayClient();
        return $api
                    ->countryCode('uk') 
                    ->year('2023') 
                    ->result();
      
    }
```

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
> Thank You! Buy me a coffe
