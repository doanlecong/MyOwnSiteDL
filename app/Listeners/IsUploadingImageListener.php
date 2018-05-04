<?php

namespace App\Listeners;

use Unisharp\Laravelfilemanager\Events\ImageIsUploading;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IsUploadingImageListener
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
     * @param  ImageIsUploading  $event
     * @return void
     */
    public function handle(ImageIsUploading $event)
    {
        //
    }
}
