<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Image;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call([
//            UsersTableSeeder::class,
//        ]);
//
//        $this->call(PostsTableSeeder::Class);
//        $this->call(ImagesTableSeeder::class);
//
//        $this->call(CommentsTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin'.'@mail.com',
            'password' => bcrypt('12345678'),
//            'enabled' => true,
//            'email_confirmed' => true,

        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1'.'@mail.com',
            'password' => bcrypt('12345678'),
//            'enabled' => true,
//            'email_confirmed' => true,

        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2'.'@mail.com',
            'password' => bcrypt('12345678'),
//            'enabled' => false,
//            'email_confirmed' => false,

        ]);


        factory(App\User::class, 2)->create()->each(function ($u) {

        });

        $posts = factory(Post::class)->times(20)->make()->each(function ($post, $index) {
            if ($index == 0) {
            }
        });

        Post::insert($posts->toArray());

        $posts = factory(Image::class)->times(20)->make()->each(function ($post, $index) {
            if ($index == 0) {
                // $cap->field = 'value';
            }
        });

        Image::insert($posts->toArray());

        $cs = factory(Comment::class)->times(50)->make()->each(function ($c, $index) {


            $c['post_id'] = 1;
            $c['reply_to'] = $index;

        });

        Comment::insert($cs->toArray());

    }
}
