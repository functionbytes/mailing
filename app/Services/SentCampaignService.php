<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SentCampaignService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/sent_campaigns');
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

    public function getAllSentCampaigns(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    public function getSentCampaignById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    public function cancelSentCampaign(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/cancel");
    }

    public function pauseSentCampaign(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/pause");
    }

    public function resumeSentCampaign(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/resume");
    }

    public function getCampaignClicks(int $id, array $params = [])
    {
        return $this->sendRequest('GET', "/{$id}/clicks", [], $params);
    }

    public function getCampaignImpressions(int $id, array $params = [])
    {
        return $this->sendRequest('GET', "/{$id}/impressions", [], $params);
    }

    public function getCampaignSentEmails(int $id, array $params = [])
    {
        return $this->sendRequest('GET', "/{$id}/sent_emails", [], $params);
    }

    public function getCampaignUnsubscribeEvents(int $id, array $params = [])
    {
        return $this->sendRequest('GET', "/{$id}/unsubscribe_events", [], $params);
    }
}
