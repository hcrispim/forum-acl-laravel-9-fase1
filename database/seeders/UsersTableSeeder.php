<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;
use app\database\factories\UserFactory;
use App\Models\User;
use App\Models\Thread;



class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
/*     factory(\App\Models\User::class, 5)->create()->each(function ($user) {
      $thread = factory(\App\Models\Thread::class, 3)->make();

      $user->threads()->saveMany($thread);
    }); */
    $user = User::factory()->count(5)->make();  
    $user->each(function ($user) {
      $thread = Thread::factory()->count(3)->make();
      $user->threads()->saveMany($thread);
    });

/*     factory()->count(5)->create()->each(function ($user) {
      $thread = Thread::factory()->count(3)->make();
      $user->threads()->saveMany($thread);
    }); */
}
}