<?php

namespace App\Console\Commands;

use App\Post;
use BearSync\BearNote;
use Illuminate\Console\Command;

class BearSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bear:import {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import bear notes';

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
        $note = BearNote::whereTitle($this->argument('title'))->first();

        if (!$note) {
            $this->error('No title found for: '.$this->argument('title'));
            return;
        }

        Post::create([
            'title' => $note->title,
            'body' => $note->content,
        ]);

        $this->info('Post Model was created!');
    }
}
