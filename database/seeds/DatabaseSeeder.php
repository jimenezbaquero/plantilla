<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'minero']);
        Role::create(['name'=>'guest']);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('1234'), // password
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('admin');


        for($i=1;$i<100;$i++) {
            $user = User::create([
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@email.com',
                'email_verified_at' => now(),
                'password' => bcrypt('1234'), // password
                'remember_token' => Str::random(10),
            ]);
            $user->assignRole('minero');
        }

    }
}
