<?php

namespace Laraflash\Website\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Laraflash\DAL\Models\DataSource;

class FetchArticlesFromDataSourceJob implements ShouldQueue
{
    protected $source;
    protected $attribute;
    protected $value;

    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(DataSource $source, string $attribute = null, $value = null)
    {
        $this->source = $source;
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $crawler = app()->makeWith($this->source->crawler_class, ['source' => $this->source]);

        if (!is_null($this->attribute) && !is_null($this->value)) {
            $crawler->{$this->attribute} = $this->value;
        }

        $crawler->process();
    }

    public function tags()
    {
        return ['crawl', 'source:'.$this->source->name];
    }
}
