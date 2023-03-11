<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CbrParserService;

class CbrParserCommand extends Command
{
    /**
     * Команда артисан для парсинга с сайта цбрф
     *
     * @var string
     */
    protected $signature = 'parse:cbr';

    /**
     * описание команды.
     *
     * @var string
     */
    protected $description = 'Parse CBR data';

    /**
     * запуск команды.
     */
    public function handle(): void
    {
        //
        $service = new CbrParserService();
        $service->parse();
    }
}
