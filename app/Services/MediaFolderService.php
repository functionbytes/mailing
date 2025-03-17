<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MediaFolderService
{
    protected $client;
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY');
        $this->apiUrl = env('MAILRELAY_URL', 'https://app.mailrelay.com/api');
        $this->client = new Client();
    }

    public function createMediaFolder($name)
    {
        try {
            $response = $this->client->post("{$this->apiUrl}/media_folders", [
                'json' => [
                    'name' => $name
                ],
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                ],
            ]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
