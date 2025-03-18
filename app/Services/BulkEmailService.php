<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class BulkEmailService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/send_emails');
        $this->client = new Client([
            'headers' => [
                'x-auth-token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    protected function sendRequest(string $method, array $data)
    {
        try {
            $response = $this->client->request($method, $this->apiUrl, ['json' => $data]);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Enviar correos electrónicos en bloque
     */
    public function sendBulkEmails(array $emailData)
    {
        return $this->sendRequest('POST', $emailData);
    }
}
