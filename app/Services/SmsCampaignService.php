<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SmsCampaignService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/sms_campaigns');
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
     * Obtener todas las campañas de SMS
     */
    public function getAllCampaigns()
    {
        return $this->sendRequest('GET');
    }

    /**
     * Obtener una campaña de SMS por ID
     */
    public function getCampaignById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Crear una nueva campaña de SMS
     */
    public function createCampaign(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Eliminar una campaña de SMS
     */
    public function deleteCampaign(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }
}
