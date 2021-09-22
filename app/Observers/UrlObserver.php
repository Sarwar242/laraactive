<?php
/**
namespace App\Observers;
use App\Jobs\CalculateUsedDiskSpace;
use App\Jobs\GenerateUrlPreview;
use Illuminate\Support\Facades\Bus;

class UrlObserver
{
    public function created(Url $url)
    {
        $queue = [new GenerateUrlPreview($url)];

        if (request()->user()) {
            $queue[] = new CalculateUsedDiskSpace(request()->user());
        }

        Bus::chain($queue)->dispatch();
    }
    //
} */
