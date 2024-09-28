<?php
namespace App\Jobs;

use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteRentalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rentalId;

    public function __construct($rentalId)
    {
        $this->rentalId = $rentalId;
    }

    public function handle()
    {
        Rental::where('id', $this->rentalId)->delete();
    }
}

