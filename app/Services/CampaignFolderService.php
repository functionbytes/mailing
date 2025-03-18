<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CampaignFolderService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/campaign_folders');
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


    public function getAllFolders(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    public function getFolderById(int $id)
    {
        return $this->sendRequest('GET', sprintf('/%d', $id));
    }

    public function createFolder(string $name)
    {
        return $this->sendRequest('POST', '', ['name' => $name]);
    }

    public function updateFolder(int $id, string $name)
    {
        return $this->sendRequest('PATCH', sprintf('/%d', $id), ['name' => $name]);
    }

    public function deleteFolder(int $id)
    {
        return $this->sendRequest('DELETE', sprintf('/%d', $id));
    }

}
