<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\ImageOptimizer\OptimizerChainFactory;

/**
 * Class ImgOptimize.
 *
 * @package App\Console\Commands
 */
class ImgOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'img:optimize {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $path = $this->argument('path') ? $this->argument('path') : $this->ask('Please enter image path: ');
        $optimizerChain = OptimizerChainFactory::create();
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = pathinfo($path, PATHINFO_FILENAME);
        $dirname = pathinfo($path, PATHINFO_DIRNAME);
        $backupPath = $dirname . '/' . $filename . '.backup.' . $ext;
        passthru("/bin/cp $path $backupPath");
        $this->info('Optimizing...');
        $optimizerChain->optimize($path);
    }
}