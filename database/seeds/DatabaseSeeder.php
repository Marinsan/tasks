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
        initialize_roles();
        create_primary_user();
        create_example_tasks();
        create_example_tags();
        create_example_tasks_with_tags();
        sample_logs();

        //crear usuaris de proves
        sample_users();
        // todo com fero en el registre
    }
}
