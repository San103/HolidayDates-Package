<?php

namespace San103\Phpholidayapi;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Date;
use GuzzleHttp\Client;
class HolidayClientLaravel{
    protected $api;

    private $countryCode = 'philippines';
    protected $year;
    protected $apiKey;
    public function __construct(){
        $this->year = date('Y');
        $this->apiKey = 'AIzaSyCxa_wfS4ITyuGgbPh4P4SQjQI942bHGx0';
    }
    public function countryCode($code){
       $this->countryCode = $code;
        return $this;
    }

    public function apiKey($key){
       $this->apiKey = $key;
       return $this;
    }

    public function year($y){
        $this->year = $y;
        return $this;
    }

    public function result(){

        $cc = $this->countryCode;
        $http = "https://www.googleapis.com/calendar/v3/calendars/en.{$cc}%23holiday%40group.v.calendar.google.com/events?key=";

        return Cache::remember(date('Y'), now()->addMonth(), function () use ($http) {
            try {
                $response = Http::timeOut(3)->get($http . $this->apiKey);
                if ($response->successful()) {

                    $toJson = collect($response->json()['items']);

                    $arrayFilter = $toJson->filter(function ($item, $key) {
                        return $item['description'] === 'Public holiday' && date('Y', strtotime($item['start']['date'])) === date('Y') && $item['status'] === 'confirmed';
                    });

                    $filtered = $arrayFilter->map(function ($item) {

                        return [
                            'id' => $item['id'],
                            'title' => $item['summary'],
                            'description' => $item['description'],
                            'start' => $item['start'],
                            'end' => $item['end'],
                        ];
                    });

                    return $filtered;
                }
                return self::localHolidays();
            } catch (Exception) {
                return self::localHolidays();
            }
        });
    }


    public static function localHolidays()
    {
        return array(
            [
                [
                    "title" => "New Year's Day",
                    "start" => [
                        "date" => "2023-01-01"
                    ]
                ],
                [
                    "title" => "People Power Anniversary",
                    "start" => [
                        "date" => "2023-02-25"
                    ]
                ],
                [
                    "title" => "Maundy Thursday",
                    "start" => [
                        "date" => "2023-04-06"
                    ]
                ],
                [
                    "title" => "Good Friday",
                    "start" => [
                        "date" => "2023-04-07"
                    ]
                ],
                [
                    "title" => "Black Saturday",
                    "start" => [
                        "date" => "2023-04-08"
                    ]
                ],
                [
                    "title" => "Labor Day",
                    "start" => [
                        "date" => "2023-05-01"
                    ]
                ],
                [
                    "title" => "Independence Day",
                    "start" => [
                        "date" => "2023-06-12"
                    ]
                ],
                [
                    "title" => "Ninoy Aquino Day",
                    "start" => [
                        "date" => "2023-08-21"
                    ]
                ],
                [
                    "title" => "National Heroes Day",
                    "start" => [
                        "date" => "2023-08-28"
                    ]
                ],
                [
                    "title" => "Special non-working day after New Year",
                    "start" => [
                        "date" => "2023-01-02"
                    ]
                ],
                [
                    "title" => "The Day of Valor",
                    "start" => [
                        "date" => "2023-04-10"
                    ]
                ],
                [
                    "title" => "Day off for People Power Anniversary",
                    "start" => [
                        "date" => "2023-02-24"
                    ]
                ],
                [
                    "title" => "Eidul-Fitar Holiday",
                    "start" => [
                        "date" => "2023-04-21"
                    ]
                ],
                [
                    "title" => "Eid al-Adha (Feast of the Sacrifice)",
                    "start" => [
                        "date" => "2023-06-28"
                    ]
                ],
                [
                    "title" => "All Saints' Day",
                    "start" => [
                        "date" => "2023-11-01"
                    ]
                ],
                [
                    "title" => "All Souls' Day",
                    "start" => [
                        "date" => "2023-11-02"
                    ]
                ],
                [
                    "title" => "Day off for Bonifacio Day",
                    "start" => [
                        "date" => "2023-11-27"
                    ]
                ],
                [
                    "title" => "Christmas Day",
                    "start" => [
                        "date" => "2023-12-25"
                    ]
                ],
                [
                    "title" => "Rizal Day",
                    "start" => [
                        "date" => "2023-12-30"
                    ]
                ],
                [
                    "title" => "New Year's Eve",
                    "start" => [
                        "date" => "2023-12-31"
                    ]
                ]
            ]

        );
    }
}