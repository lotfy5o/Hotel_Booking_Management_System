<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PromoteUserToAdmin extends Command
{
    protected $signature = 'user:promote {userId}';
    protected $description = 'Promote a user to admin';

    public function handle()
    {
        $userId = $this->argument('userId');
        $user = User::find($userId);

        if ($user) {
            $user->role = 'admin';
            $user->save();
            $this->info('User promoted to admin successfully.');
        } else {
            $this->error('User not found.');
        }
    }
}
