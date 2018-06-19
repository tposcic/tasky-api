<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Task;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::get()->pluck('id');
        $task_categories = Category::get()->pluck('id');

        for($i=0; $i<500; $i++){
            $task = new Task;

            $insert_data = array(
                'title' => $faker->word,
                'category_id' => $task_categories->random(),
                'description' => $faker->sentence,
            );

            $task->title = $insert_data['title'];
            $task->category_id = $insert_data['category_id'];
            $task->description = $insert_data['description'];

            $task->save();
            
            $task->users()->attach($users->random());
        }    
    }
}
