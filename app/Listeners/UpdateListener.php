<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;

class UpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     *
     * @param  object  $event
     *
     */
    public function handle($event)
    {
        dump('migration ok ');
        $url = 'testurl';
        return (new MailMessage)
            ->from($url)
            ->subject('Invoice Paid');

    }
}
