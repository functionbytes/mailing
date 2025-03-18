<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GroupService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/groups');
        $this->client = new Client([
            'headers' => [
                'x-auth-token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    protected function sendRequest(string $method, string $endpoint = '', array $data = [], array $query = [])
    {
        try {
            $options = [];
            if (!empty($query)) {
                $options['query'] = $query;
            }
            if (!empty($data)) {
                $options['json'] = $data;
            }

            $response = $this->client->request($method, "{$this->apiUrl}{$endpoint}", $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getAllGroups(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    public function getGroupById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    public function createGroup(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    public function updateGroup(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    public function deleteGroup(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }
}
