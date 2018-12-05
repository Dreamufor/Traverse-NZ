<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 21/08/18
 * Time: 4:26 PM
 */

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {

    $img_id = (int)$faker->numberBetween($min = 1, $max = 5);

    return [
        // 'name' => $faker->name,
        'post_id' => $faker ->numberBetween($min = 1, $max = 20),
//        'url' => 'https://picsum.photos/400/300?image='.$img_id,
        'url' => '/img/card'.$img_id.".jpg",
        // 'category_id' => factory('App\Models\Category')->create()->id,
        // 'supplier_id' => factory('App\Models\Supplier')->create()->id,
//        'category_id' => $faker ->numberBetween($min = 1, $max = 3),
//        'supplier_id' => $faker ->numberBetween($min = 1, $max = 3),
    ];
});
