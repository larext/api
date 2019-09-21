<?php

namespace LarExt\API\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PanelDesktop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'panel:desktop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Sencha ExtJS Desktop Admin Panel';

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
        //

        $name = $this->ask("What is your name");
        echo $name;
        $name = $this->confirm('What is your name');
        echo $name;
        $this->info('Start create ExtJS Desktop Admin Panel');
        $this->error('Something went wrong!');
        $this->line('Display this on the screen');

        $headers = ['Name', 'Email'];
        $users = \App\User::all(['name', 'email'])->toArray();
        $this->table($headers, $users);

        $bar = $this->output->createProgressBar(100);

        $bar->start();
        for($i =0; $i <100; $i++) {
            $bar->advance();
            usleep(500000);
        }

        $bar->finish();
        $this->line('');
        $this->info('All commands completed successfully');
        //$this->call("help");

        $process = new Process(['ls', '-l']);
        $process->start();
        $process->wait();
        if($process->isSuccessful()){
            echo $process->getOutput();
        }else{
            echo $process->getErrorOutput();
        }

//        $process = new Process(['ls', '-lsa']);
//
//        try {
//
//            $process->mustRun();
//
//            echo $process->getOutput();
//        } catch (ProcessFailedException $exception) {
//            echo $exception->getMessage();
//        }

        $this->line('');
    }
}
