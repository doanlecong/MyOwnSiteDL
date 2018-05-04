<?php

namespace App\Listeners;

use Unisharp\Laravelfilemanager\Events\ImageIsRenaming;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RenameImageListener
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
     * @param  ImageIsRenaming  $event
     * @return void
     */
    public function handle(ImageIsRenaming $event)
    {
        //
    }
}
