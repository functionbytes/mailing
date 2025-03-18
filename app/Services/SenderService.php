<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SenderService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/senders');
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
     * Obtener todos los remitentes con filtros opcionales
     */
    public function getAllSenders(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    /**
     * Obtener un remitente por ID
     */
    public function getSenderById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Crear un nuevo remitente
     */
    public function createSender(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Actualizar un remitente
     */
    public function updateSender(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    /**
     * Eliminar un remitente por ID
     */
    public function deleteSender(int $id, int $newSenderId = 0)
    {
        return $this->sendRequest('DELETE', "/{$id}", ['new_sender_id' => $newSenderId]);
    }

    /**
     * Enviar correo de confirmación a un remitente
     */
    public function sendConfirmationEmail(int $id)
    {
        return $this->sendRequest('POST', "/{$id}/send_confirmation_email");
    }
}
