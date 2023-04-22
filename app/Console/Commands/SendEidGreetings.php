<?php

namespace App\Console\Commands;

use App\Mail\EidGreetings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEidGreetings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:eid-greetings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Eid greetings email to all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = \App\Models\User::find(1);

//        foreach ($users as $user) {
            Mail::to($user->email)->send(new EidGreetings(['user' => $user]));
//        }

        $this->info('Eid greetings email sent successfully!');
    }
}