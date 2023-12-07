<?php

namespace San103\Phpholidayapi;
use GuzzleHttp\Client;
class holiday{
    protected $api;
    protected $apiKey;
    // private static int $gapi = ;
    public function countryCode($code = 'philippines'){
       $this->api = "https://www.googleapis.com/calendar/v3/calendars/en.{$code}%23holiday%40group.v.calendar.google.com/events?key=";
        return $this;
    }

    public function apiKey($key = 'AIzaSyCxa_wfS4ITyuGgbPh4P4SQjQI942bHGx0'){
       $this->apiKey = $key;
       return $this;
    }

   

    public function result(){

        $client = new Client();
            try {
                $response = $client->get($this->api . $this->apiKey);

                if ($response->getStatusCode() == 200) {

                    // $toJson = collect($response->json()['items']);
                    $jsonData = json_decode($response->getBody(), true);

                    $filteredData = array_filter($jsonData['items'], function ($item) {
                        return $item['description'] === 'Public holiday'
                            && date('Y', strtotime($item['start']['date'])) === date('Y')
                            && $item['status'] === 'confirmed';
                    });

                    $mappedData = array_map(function ($item) {
                        return [
                            'id' => $item['id'],
                            'title' => $item['summary'],
                            'description' => $item['description'],
                            'start' => $item['start'],
                            'end' => $item['end'],
                        ];
                    }, $filteredData);

                    return $mappedData;
                }
                return self::localHolidays();
            } catch (Exception) {
                return self::localHolidays();
            }
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