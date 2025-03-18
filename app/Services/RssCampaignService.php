<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RssCampaignService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/rss_campaigns');
        $this->client = new Client([
            'headers' => [
                'x-auth-token' => $this->apiKey,
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    /**
     * Método genérico para enviar peticiones a la API
     */
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

    /**
     * Obtener todas las campañas RSS con filtros opcionales
     */
    public function getAllRssCampaigns(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    /**
     * Obtener una campaña RSS por ID
     */
    public function getRssCampaignById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Crear una nueva campaña RSS
     */
    public function createRssCampaign(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Actualizar una campaña RSS
     */
    public function updateRssCampaign(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    /**
     * Eliminar una campaña RSS por ID
     */
    public function deleteRssCampaign(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }

    /**
     * Obtener las entradas procesadas de una campaña RSS
     */
    public function getProcessedEntries(int $id, array $params = [])
    {
        return $this->sendRequest('GET', "/{$id}/processed_entries", [], $params);
    }
}
