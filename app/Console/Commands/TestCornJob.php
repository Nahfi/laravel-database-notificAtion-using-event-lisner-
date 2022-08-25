<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Test;
use Illuminate\Support\Str;
class TestCornJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'corn:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $test = new Test();
        $test->name = Str::random(3);
        $test->save();
    }
}
