<?php

use Faker\Generator as Faker;

$factory->define(\App\Venue::class, function (Faker $faker) {
    $type = \App\Type::inRandomOrder()->first();
    return [

        "type_id"=>$type->id,
        'name' => $faker->sentence(5),
        "address"=>$faker->address,
        "pics"=>"img01.jpg,img02.jpg,img03.jpg",
        "num"=>rand(1,10),
        "des"=>$faker->text,
        'state' => 1,
    ];
});
