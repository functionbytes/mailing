<?php

namespace App\Mail\Subscribers;

use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber\Subscriber;
use App\Models\Layout\Layout;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class SubscribersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletter;

    /**
     * Crea una nueva instancia de la clase de correo.
     *
     * @param Subscriber $newsletter
     */
    public function __construct(Subscriber $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Construir el mensaje del correo.
     *
     * @return $this
     */
    public function build()
    {

        $template = Layout::where('alias', 'sender_verification_email')->first();

        if (is_null($template)) {
            throw new \Exception("Layout/template 'sender_verification_email' is missing!");
        }

        $htmlContent = $template->content;

        $htmlContent = str_replace('{USER_NAME}', $this->name, $htmlContent);
        $htmlContent = str_replace('{USER_EMAIL}', $this->email, $htmlContent);
        $htmlContent = str_replace('{VERIFICATION_LINK}', $this->generateVerificationUrl(), $htmlContent);

//        // build the message
//        $message = new ExtendedSwiftMessage();
//        $message->setEncoder(new \Swift_Mime_ContentEncoder_PlainContentEncoder('8bit'));
//        $message->setContentType('text/html; charset=utf-8');
//
//        $message->setSubject($template->subject);
//        $message->setTo($this->email);
//        $message->setReplyTo(Setting::get('mail.reply_to'));
//        $message->addPart($htmlContent, 'text/html');
//
//        $mailer = App::make('xmailer');
//        $result = $mailer->sendWithDefaultFromAddress($message);
//
//        if (array_key_exists('error', $result)) {
//            throw new \Exception($result['error']);
//        }

        return $this->subject('Newsletter - ' . $this->newsletter->title)
            ->view('emails.newsletters.actions')  // Asegúrate de tener la vista de correo configurada
            ->with([
                'newsletter' => $this->newsletter,
            ]);
    }
}
