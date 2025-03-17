<?php
namespace App\Services;

use App\Services\EmailService;
use App\Services\ABTestService;
use App\Services\CampaignService;
use App\Services\CampaignFolderService;
use App\Services\CustomFieldService;
use App\Services\ImportService;
use App\Services\GroupService;
use App\Services\MediaFileService;
use App\Services\MediaFolderService;
use App\Services\RssCampaignService;
use App\Services\SenderService;
use App\Services\SentCampaignService;
use App\Services\SmtpEmailService;
use App\Services\SignupFormService;
use App\Services\SmtpTagService;
use App\Services\SubscriberService;
use App\Services\UnsubscribeEventService;
use App\Services\BounceService;
use App\Services\ApiBatchService;
use App\Services\SmsTransactionalService;
use App\Services\SmsCampaignService;
use App\Services\SmsSentMessagesService;
use GuzzleHttp\Client;

class MailRelayService
{
    protected $emailService;
    protected $abTestService;
    protected $campaignService;
    protected $campaignFolderService;
    protected $customFieldService;
    protected $importService;
    protected $groupService;
    protected $mediaFileService;
    protected $mediaFolderService;
    protected $rssCampaignService;
    protected $senderService;
    protected $sentCampaignService;
    protected $smtpEmailService;
    protected $signupFormService;
    protected $smtpTagService;
    protected $subscriberService;
    protected $unsubscribeEventService;
    protected $bounceService;
    protected $apiBatchService;
    protected $smsTransactionalService;
    protected $smsCampaignService;
    protected $smsSentMessagesService;

    public function __construct(Client $client)  // Solo inyectamos el cliente HTTP
    {
        $this->client = $client;
        $this->apiKey = env('MAILRELAY_API_KEY');  // Obtener la API Key desde el archivo .env
        $this->apiUrl = env('MAILRELAY_URL', 'https://inoqualab.mailrelay.com/api/v1');  // URL predeterminada
    }

    // Métodos que llaman a los diferentes servicios.
    public function sendEmail($subject, $htmlContent, $textContent, $listId)
    {
        return $this->emailService->sendEmail($subject, $htmlContent, $textContent, $listId);
    }

    public function createABTest($name, $subjectA, $subjectB, $listId)
    {
        return $this->abTestService->createABTest($name, $subjectA, $subjectB, $listId);
    }

    public function createCampaign(array $data)
    {
        $url = $this->apiUrl . '/campaigns';  // Endpoint para crear una campaña

        try {
            $response = $this->client->post($url, [
                'json' => $data,
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);  // Devuelve la respuesta de MailRelay
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];  // Manejo de errores si la API falla
        }
    }

    public function createList($listName, $description)
    {
        $url = $this->apiUrl . '/lists';

        try {
            $response = $this->client->post($url, [
                'json' => [
                    'name' => $listName,
                    'description' => $description,
                ],
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);  // Devuelve la respuesta de MailRelay
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];  // Devuelve el error si la API falla
        }
    }

    public function addSubscriberToMailRelays($name, $subject, $listId, $htmlContent, $textContent)
    {
        return $this->subscriberService->createCampaign($name, $subject, $listId, $htmlContent, $textContent);
    }
    public function addSubscriberToMailRelay($name, $email, $listId)
    {
        $url = $this->apiUrl . '/subscribers';

        try {
            $response = $this->client->post($url, [
                'json' => [
                    'email' => $email,
                    'name' => $name,
                    'list_id' => $listId,  // Pasamos el list_id junto con el correo y nombre
                ],
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true); // Devuelve la respuesta de MailRelay
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()]; // Devuelve el error si la API falla
        }
    }


    public function createCampaignFolder($name)
    {
        return $this->campaignFolderService->createCampaignFolder($name);
    }

    public function createCustomField($name, $type)
    {
        return $this->customFieldService->createCustomField($name, $type);
    }

    public function importSubscribers($listId, $file)
    {
        return $this->importService->importSubscribers($listId, $file);
    }

    public function createGroup($name, $listId)
    {
        return $this->groupService->createGroup($name, $listId);
    }

    public function uploadMediaFile($file)
    {
        return $this->mediaFileService->uploadMediaFile($file);
    }

    public function createMediaFolder($name)
    {
        return $this->mediaFolderService->createMediaFolder($name);
    }

    public function createRSSCampaign($name, $rssFeedUrl)
    {
        return $this->rssCampaignService->createRSSCampaign($name, $rssFeedUrl);
    }

    public function createSender($name, $email)
    {
        return $this->senderService->createSender($name, $email);
    }

    public function getSentCampaigns()
    {
        return $this->sentCampaignService->getSentCampaigns();
    }

    public function sendSMTPEmail($subject, $htmlContent, $toEmail)
    {
        return $this->smtpEmailService->sendSMTPEmail($subject, $htmlContent, $toEmail);
    }

    public function createSignupForm($name, $listId)
    {
        return $this->signupFormService->createSignupForm($name, $listId);
    }

    public function createSMTPTag($tagName)
    {
        return $this->smtpTagService->createSMTPTag($tagName);
    }

    public function getSubscribersList()
    {
        return $this->subscriberService->getSubscribersList();
    }

    public function getUnsubscribeEvents()
    {
        return $this->unsubscribeEventService->getUnsubscribeEvents();
    }

    public function getBounces()
    {
        return $this->bounceService->getBounces();
    }

    public function executeBatch($batchData)
    {
        return $this->apiBatchService->executeBatch($batchData);
    }

    public function sendTransactionalSMS($phoneNumber, $message)
    {
        return $this->smsTransactionalService->sendTransactionalSMS($phoneNumber, $message);
    }

    public function createSMSCampaign($name, $message, $listId)
    {
        return $this->smsCampaignService->createSMSCampaign($name, $message, $listId);
    }

    public function getSMSMessagesSent()
    {
        return $this->smsSentMessagesService->getSMSMessagesSent();
    }
}

