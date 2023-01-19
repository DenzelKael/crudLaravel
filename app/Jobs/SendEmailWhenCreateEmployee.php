<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailWhenCreateEmployee implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $employee;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd($this->employee);
    }
}