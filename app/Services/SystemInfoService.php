<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SystemInfoService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1');
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
    protected function sendRequest(string $method, string $endpoint = '', array $query = [])
    {
        try {
            $options = [];
            if (!empty($query)) {
                $options['query'] = $query;
            }

            $response = $this->client->request($method, "{$this->apiUrl}{$endpoint}", $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Obtener información del paquete
     */
    public function getPackageInfo()
    {
        return $this->sendRequest('GET', '/package');
    }

    /**
     * Verificar la conexión con la API (ping)
     */
    public function ping()
    {
        return $this->sendRequest('GET', '/ping');
    }

    /**
     * Obtener estadísticas del sistema
     */
    public function getStats(array $params = [])
    {
        return $this->sendRequest('GET', '/stats', $params);
    }
}
