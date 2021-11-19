<?php

namespace PyrobyteWeb\Swagger\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use OpenApi\Generator;

class SwaggerGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swagger:generate';

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
     * @return int
     */
    public function handle()
    {
        $openapi = Generator::scan([base_path(config('swagger.scan_path'))]);
        $savePath = public_path(config('swagger.save_path'));
        $file = config('swagger.file_name') . '.' . config('swagger.file_extension');

        if (!File::exists($savePath .'/'. $file)) {
            File::makeDirectory($savePath);
        }

        $openapi->saveAs($savePath .'/'. $file, config('swagger.file_extension'));

        return Command::SUCCESS;
    }
}
