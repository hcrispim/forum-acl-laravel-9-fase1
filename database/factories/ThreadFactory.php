<?php

namespace Database\Factories;

use App\Models\Thread;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Thread::class;
  
    public function definition()
    {
       $title = $faker->sentence;
        return [
          'title' => $title,
          'body'  => $faker->paragraph(2),
          'slug'  => Str::slug($title)
         ];
    }
  }

  /*     return [
    	'channel_id' => function() {
			return factory(\App\Channel::class)->create()->id;
	    },
	    'user_id' => function() {
		    return factory(\App\User::class)->create()->id;
	    },
        'title' => $title,
	    'body'  => $faker->paragraph(2),
	    'slug'  => Str::slug($title)
    ]; */