<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AutomationService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/automations');
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
     * Obtener todas las automatizaciones con filtros opcionales
     */
    public function getAllAutomations(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    /**
     * Obtener una automatización por ID
     */
    public function getAutomationById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Crear una nueva automatización
     */
    public function createAutomation(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Actualizar una automatización
     */
    public function updateAutomation(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    /**
     * Eliminar una automatización
     */
    public function deleteAutomation(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }

    /**
     * Activar o desactivar una automatización
     */
    public function toggleAutomation(int $id, bool $status)
    {
        return $this->sendRequest('PATCH', "/{$id}/toggle", ['status' => $status]);
    }
}
