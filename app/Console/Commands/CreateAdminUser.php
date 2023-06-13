<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:admin {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::forceCreate([
            'email' => $this->argument('email'),
            'name' => $this->argument('name'),
            'password' => Hash::make($this->argument('password')),
            'is_admin' => true,
            'is_tutor' => true
        ]);
        $user->save();
        return $user->id;
    }
}
