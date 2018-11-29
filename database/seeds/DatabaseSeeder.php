<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        create_primary_user();
        // $this->call(UsersTableSeeder::class);

        create_example_tasks();

        create_example_tags();

        initialize_roles();

        sample_users();

        //crear usuaris de proves

        // todo com fero en el registre
    }
}
