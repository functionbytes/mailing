<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SmsSentMessagesService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/sms_sent_messages');
        $this->client = new Client([
            'headers' => [
                'x-auth-token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    protected function sendRequest(string $method, string $endpoint = '', array $data = [])
    {
        try {
            $options = !empty($data) ? ['json' => $data] : [];
            $response = $this->client->request($method, "{$this->apiUrl}{$endpoint}", $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Obtener todos los mensajes SMS enviados
     */
    public function getAllSentMessages()
    {
        return $this->sendRequest('GET');
    }

    /**
     * Obtener un mensaje SMS enviado por ID
     */
    public function getSentMessageById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }
}
