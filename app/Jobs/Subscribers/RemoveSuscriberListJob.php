<?php

namespace App\Jobs\Subscribers;

use App\Models\Subscriber\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use function App\Jobs\optional;

class RemoveSuscriberListJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ?Subscriber $subscriber;
    protected  $listIds;
    protected bool $removeAll;


    public function __construct($subscriber, array $mailingLists = [], bool $removeAll = false)
    {
        $this->subscriber = $subscriber instanceof Subscriber ? $subscriber : Subscriber::find($subscriber);
        $this->listIds = array_filter($mailingLists);
        $this->removeAll = $removeAll;
    }

    public function handle(): void
    {

        if ($this->removeAll) {
            if (method_exists($this->subscriber, 'removeAllSubscriptions')) {
                $this->subscriber->removeAllSubscriptions();
                Log::info("RemoveSuscriberListJob: Suscriptor ID {$this->subscriber->id} eliminado de TODAS las listas.");
            }
            return;
        }

        if (!empty($this->listIds) && method_exists($this->subscriber, 'removeSpecificLists')) {
            $this->subscriber->removeSpecificLists($this->listIds);
            Log::debug("RemoveSuscriberListJob: Suscriptor ID {$this->subscriber->id} eliminado de listas específicas: " . implode(', ', $this->listIds));
        }
    }
}
