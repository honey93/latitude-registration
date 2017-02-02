<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

          Model::unguard();

        DB::table('users')->delete();

        $users = array(
                ['name' => 'Honey', 'email' => 'thakuria.honey@gmail.com', 'password' => Hash::make('Honey123')],
                ['name' => 'chitru', 'email' => 'chitru@latitude.in', 'password' => Hash::make('chitru123')],
               
        );
            
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();


    }
}
