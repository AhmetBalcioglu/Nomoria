<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RestaurantService
{
    protected $client;
    protected $googleApiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->googleApiKey = env('GOOGLE_PLACES_API_KEY');
    }

    public function getRestaurants($location = '37.7749,-122.4194', $radius = 1500, $totalResults = 50)
    {
        $restaurants = [];
        $nextPageToken = null;
        $resultsToFetch = $totalResults;
        $pageCounter = 0; // Kaçıncı sayfadayız, bunu takip edelim


        while ($resultsToFetch > 0) {
            $params = [
                'location' => $location,
                'radius' => $radius,
                'type' => 'restaurant',
                'key' => $this->googleApiKey,
            ];

            if ($nextPageToken) {
                $params['pagetoken'] = $nextPageToken;
            }

            try {

                $response = $this->client->get('https://maps.googleapis.com/maps/api/place/nearbysearch/json', [
                    'query' => $params
                ]);

                $data = json_decode($response->getBody()->getContents(), true);

                if (isset($data['results'])) {

                    $restaurants = array_merge($restaurants, $data['results']);
                    $resultsToFetch -= count($data['results']);
                }


                $nextPageToken = $data['next_page_token'] ?? null;


                if ($nextPageToken) {
                    $pageCounter++;
                    if ($pageCounter >= 3) break;
                    sleep(2);
                } else {
                    break;
                }
            } catch (RequestException $e) {
                \Log::error('RequestException: ' . $e->getMessage());
                break;
            }
        }

        return array_slice($restaurants, 0, $totalResults);
    }
}
