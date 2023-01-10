<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
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
        $series = [
            [
                'name'=> 'PHP',
                'image'=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png',
            ],
            [
            'name'=> 'JavaScript',
            'image'=> 'https://w7.pngwing.com/pngs/723/622/png-transparent-javascript-jquery-dialog-box-node-js-angularjs-windows-explorer-miscellaneous-angle-text.png',
            ],
            [
                'name'=> 'Java',
                'image'=>'https://logos-world.net/wp-content/uploads/2022/07/Java-Logo.png',
            ],
            [
                'name'=>'Laravel',
                'image'=>'https://e7.pngegg.com/pngimages/764/304/png-clipart-laravel-black-logo-tech-companies-thumbnail.png'
            ]
        ];

        foreach ($series as $item) {
            Series::create([
                'name' => $item['name'],
                'image' => $item['image'],
            ]);
        }
        $topics = ['Eloquent', 'Validation', 'Authentication', 'Testing'];

        foreach ($topics as $item) {
            Topic::create([
                'name' => $item,
            ]);
        }
        $platforms = ['Laracasts', 'Youtube', 'Larajobs', 'Laravel News', 'Laracasts Forum'];

        foreach ($platforms as $item) {
            Platform::create([
                'name' => $item,
            ]);
        }
        $authors = ['Sheikh Arif', 'Sheikh Kamran', 'Sheikh Imran'];

            foreach ($authors as $item) {
                Author::create([
                    'name' => $item,
                ]);
            }

            //create users
            User::factory(50)->create();

            //create courses
            Course::factory(100)->create();

            $courses = Course::all();
            foreach ($courses as $course) {
                $topics = Topic::all()->random(rand(1, 4))->pluck('id')->toArray();
                $course->topics()->attach($topics);


                $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
                $course->authors()->attach($authors);

                $series = Series::all()->random(rand(1, 4))->pluck('id')->toArray();
                $course->series()->attach($series);
            }
        }
    }

