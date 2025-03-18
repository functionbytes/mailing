<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SegmentService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/segments');
        $this->client = new Client([
            'headers' => [
                'x-auth-token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function getAllSegments(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    public function getSegmentById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    public function createSegment(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    public function updateSegment(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    public function deleteSegment(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }
}
