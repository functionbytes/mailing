<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SubscriberService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/subscribers');
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


    public function getAllSubscribers(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }


    public function getSubscriberById(int $id, bool $includeGroups = false)
    {
        $query = $includeGroups ? ['include_groups' => true] : [];
        return $this->sendRequest('GET', "/{$id}", [], $query);
    }

    public function createSubscriber(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    public function updateSubscriber(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    public function deleteSubscriber(int $id, bool $permanent = false)
    {
        return $this->sendRequest('DELETE', "/{$id}", ['permanent_delete' => $permanent]);
    }

    public function restoreSubscriber(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/restore");
    }

    public function banSubscriber(int $id, bool $ban = true)
    {
        $endpoint = $ban ? "/{$id}/ban" : "/{$id}/unban";
        return $this->sendRequest('PATCH', $endpoint);
    }

    public function resendConfirmationEmail(int $id)
    {
        return $this->sendRequest('POST', "/{$id}/resend_confirmation_email");
    }

    public function bulkUpdateSubscribers(array $data)
    {
        return $this->sendRequest('PATCH', "/bulk_update", $data);
    }
}
