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

> [!NOTE]
> You can provide your own Api key from [Google API](https://developers.google.com/calendar/api/guides/overview).
>  just enable the Calendar Api and generate key

```
    use San103\Phpholidayapi\HolidayClient;
```

```
    $holiday = new HolidayClient();
```

- [x] Set your Country Code e.g uk for United Kindom, us for United State
```
countryCode('uk')
```

- [x] Set what year you want to display holiday , default is set to current year
```
year('2022')
```

- [x] This must define in last chaining.
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
                    ->year('2022') 
                    ->result();
      
    }
```
