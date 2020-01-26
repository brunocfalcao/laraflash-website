<?php

namespace Laraflash\Website\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Laraflash\DAL\Models\DataSource;
use Laraflash\Website\Jobs\FetchArticlesFromDataSourceJob;

class CrawlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laraflash:crawl {--source= : Source ID or null} {--attribute= : Attribute name} {--value= : Value} {--viajob : If it should dispatched via a Job (true/false)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawls a data source, or all data sources.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // No arguments? Crawl all data sources.
        if ($this->option('source') == false) {
            $source = DataSource::all();
        } else {
            $source = collect([DataSource::findOrFail($this->option('source'))]);
        }

        // Start crawling.
        foreach ($source as $item) {
            $this->info('--------------------------------------------------------');
            $this->info("Crawl for '{$item->name}' started ...");
            if ($this->option('viajob')) {
                $this->info('Dispatching job ...');
                FetchArticlesFromDataSourceJob::dispatch($item, $this->option('attribute'), $this->option('value'))
                                              ->onQueue('laraflash-'.App::environment());
            } else {
                $crawler = app()->makeWith($item->crawler_class, ['source' => $item]);
                if (! is_null($this->option('attribute')) && ! is_null($this->option('value'))) {
                    $this->info("Setting crawler attribute {$this->option('attribute')} to {$this->option('value')}");
                    $crawler->{$this->option('attribute')} = $this->option('value');
                }
                $crawler->process();
            }

            $this->info("Crawl for '{$item->name}' finished!");
        }
    }
}
