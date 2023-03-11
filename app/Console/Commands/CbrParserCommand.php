<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CbrParserService;

class CbrParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:cbr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse CBR data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //
        $service = new CbrParserService();
        $service->parse();
    }
}
