<?php


namespace App\Models\Automation;

use Carbon\Carbon;

class AutomationElement
{
    protected $data;

    /**
     * Constructor.
     *
     * @return the associated automation2
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get options.
     *
     * @return string
     */
    public function getOptions()
    {
        if (isset($this->data) && isset($this->data->options)) {
            return (array) $this->data->options;
        }

        return;
    }

    /**
     * Get options.
     *
     * @return string
     */
    public function getOption($name)
    {
        if (isset($this->data) && isset($this->data->options) && isset($this->data->options->$name)) {
            return $this->data->options->$name;
        }

        return;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function get($name)
    {
        if (isset($this->data) && isset($this->data->$name)) {
            return $this->data->$name;
        }

        return;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getName()
    {
        switch ($this->get('type')) {
            case 'ElementTrigger':
                return trans('messages.automation.trigger.title', [
                    'title' => trans('messages.automation.trigger.'.$this->getOption('key')),
                ]);
                break;
            case 'ElementAction':
                $email = Email::findByUid($this->getOption('email_uid'));
                if ($email) {
                    return trans('messages.automation.send_a_email', ['title' => $email->subject]);
                } else {
                    return trans('messages.automation.no_email');
                }

                break;
            case 'ElementWait':
                return trans('messages.automation.wait.delay.'.$this->getOption('time'));
                break;
            case 'ElementOperation':
                return __('messages.automation.stats.operation_executed');
                break;
            case 'ElementCondition':
                if ($this->getOption('type') == 'open') {
                    return trans('messages.automation.action.condition.read_email.title');
                } elseif ($this->getOption('type') == 'click') {
                    return trans('messages.automation.action.condition.click_link.title');
                }
                break;
            default:
        }
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getIcon()
    {
        return self::getIconByType($this->get('type'));
    }

    /**
     * Get value.
     *
     * @return string
     */
    public static function getIconByType($type)
    {
        switch ($type) {
            case 'ElementTrigger':
                return '<span class="material-symbols-rounded">alt_route</span>';
                break;
            case 'ElementAction':
                return '<span class="material-symbols-rounded">forward_to_inbox</span>';
                break;
            case 'ElementWait':
                return '<span class="material-symbols-rounded">timer</span>';
                break;
            case 'ElementCondition':
                return '<i class="material-icons-outlined bg-warning">call_split</i>';
                break;
            case 'ElementOperation':
                return '<i class="material-icons-outlined bg-info">checklist_rtl</i>';
                break;
            default:
        }
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getIconWithoutBg($class = '')
    {
        switch ($this->get('type')) {
            case 'ElementTrigger':
                return '<span class="material-symbols-rounded">alt_route</span>';
                break;
            case 'ElementAction':
                return '<span class="material-symbols-rounded">forward_to_inbox</span>';
                break;
            case 'ElementWait':
                return '<span class="material-symbols-rounded">timer</span>';
                break;
            case 'ElementCondition':
                return '<i class="material-icons-outlined bg-warning">call_split</i>';
                break;
            case 'ElementOperation':
                return '<i class="material-icons-outlined bg-info">checklist_rtl</i>';
                break;
            default:
        }
    }

    /**
     * Get abandoned cart.
     *
     * @return string
     */
    public function wooGetAbandonedCart()
    {
        $client = new \GuzzleHttp\Client();
        $uri = $this->getOption('connect_url');
        $response = $client->request('GET', $uri, [
            'headers' => [
                "content-type" => "application/json"
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
