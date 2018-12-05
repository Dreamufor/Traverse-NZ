<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 21/08/18
 * Time: 3:49 PM
 */


use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {

    return [

        'content' => $faker ->text,
        'reply_to' => $faker ->numberBetween($min = 1, $max = 5),
        'user_id' => $faker ->numberBetween($min = 1, $max = 5),
        'post_id' => $faker ->numberBetween($min = 1, $max = 5),
    ];
});
