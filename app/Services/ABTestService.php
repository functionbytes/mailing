<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AbTestService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/ab_tests');
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
     * Obtener todas las pruebas A/B con filtros opcionales
     */
    public function getAllAbTests(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    /**
     * Obtener una prueba A/B por ID
     */
    public function getAbTestById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Crear una nueva prueba A/B
     */
    public function createAbTest(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Eliminar una prueba A/B
     */
    public function deleteAbTest(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }

    /**
     * Cancelar una prueba A/B
     */
    public function cancelAbTest(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/cancel");
    }

    /**
     * Elegir la combinación ganadora de una prueba A/B
     */
    public function chooseWinningCombination(int $id, array $data)
    {
        return $this->sendRequest('POST', "/{$id}/choose_winning_combination", $data);
    }

    /**
     * Configurar una prueba A/B como manual
     */
    public function setAsManual(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/set_as_manual");
    }
}
