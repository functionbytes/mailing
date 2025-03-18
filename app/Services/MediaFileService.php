<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MediaFileService
{
    protected Client $client;
    protected string $apiKey;
    protected string $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('MAILRELAY_API_KEY', '');
        $this->apiUrl = env('MAILRELAY_URL', 'https://example.ipzmarketing.com/api/v1/media_files');
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
     * Obtener todos los archivos multimedia con filtros opcionales
     */
    public function getAllMediaFiles(array $params = [])
    {
        return $this->sendRequest('GET', '', [], $params);
    }

    /**
     * Obtener un archivo multimedia por ID
     */
    public function getMediaFileById(int $id)
    {
        return $this->sendRequest('GET', "/{$id}");
    }

    /**
     * Subir un archivo multimedia
     */
    public function uploadMediaFile(array $data)
    {
        return $this->sendRequest('POST', '', $data);
    }

    /**
     * Eliminar un archivo multimedia por ID
     */
    public function deleteMediaFile(int $id)
    {
        return $this->sendRequest('DELETE', "/{$id}");
    }

    /**
     * Mover un archivo multimedia a la papelera
     */
    public function moveMediaFileToTrash(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/move_to_trash");
    }

    /**
     * Restaurar un archivo multimedia de la papelera
     */
    public function restoreMediaFile(int $id)
    {
        return $this->sendRequest('PATCH', "/{$id}/restore");
    }

    /**
     * Obtener archivos multimedia en la papelera
     */
    public function getTrashedMediaFiles(array $params = [])
    {
        return $this->sendRequest('GET', '/trashed', [], $params);
    }
}
