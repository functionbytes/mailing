<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MediaFolderService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/media_folders');
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
     * Obtener todas las carpetas de medios con filtros opcionales
     */
    public function getAllMediaFolders(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    /**
     * Obtener una carpeta de medios por ID
     */
    public function getMediaFolderById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Crear una nueva carpeta de medios
     */
    public function createMediaFolder(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Actualizar una carpeta de medios
     */
    public function updateMediaFolder(int $id, array $data)
    {
        return $this->sendRequest('PATCH', "/{$id}", $data);
    }

    /**
     * Eliminar una carpeta de medios por ID
     */
    public function deleteMediaFolder(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }
}
