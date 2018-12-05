<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 21/08/18
 * Time: 3:49 PM
 */


use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    $img_id = (int)$faker->numberBetween($min = 1, $max = 13);

    return [
        // 'name' => $faker->name,
        'title' => $faker->name,
        'featured' => $faker->boolean,
        'content' => $faker ->text,
        'departure' => $faker -> cityPrefix,
        'departure_time' => $faker -> dateTime($max = 'now', $timezone = null),
        'destination' => $faker -> cityPrefix,
        'seats' => $faker->numberBetween($min = 1, $max = 7),
        'user_id' => $faker ->numberBetween($min = 1, $max = 5),
//        'image' => 'https://picsum.photos/400/300?image='.$img_id,
//        'image' => $img_id.".jpg",
        // 'category_id' => factory('App\Models\Category')->create()->id,
        // 'supplier_id' => factory('App\Models\Supplier')->create()->id,
//        'category_id' => $faker ->numberBetween($min = 1, $max = 3),
//        'supplier_id' => $faker ->numberBetween($min = 1, $max = 3),
    ];
});
