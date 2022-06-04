<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\m_siswa;
use Faker\Generator as Faker;

$factory->define(m_siswa::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'nipdn'           =>  $faker->randomDigit,
        'nama'              =>  $faker->firstNameMale,
        'nisn'   =>  $faker->randomDigit,
        'alamat'              =>  $faker->address,
        'no_ijazah'          =>  $faker->randomDigit,
        'tahun_ijazah'           =>  $faker->dateTimeThisDecade()->format('Y'),
        'tanggal_masuk'             =>  $faker->dateTimeThisDecade,
        'email'           =>  $faker->email,
        'agama'           =>  'Islam',
        'no_telp'              =>  $faker->phoneNumber,
        'tempat_lahir'   =>  $faker->city,
        'tanggal_lahir'              =>  $faker->date,
        'asal_sekolah'          =>  'SMP'.$faker->randomDigit,
        'id_bidang'           =>  $faker->numberBetween($min = 1, $max = 10),
        'status' => $faker->randomDigit,
        'jenis_kelamin' => $gender
    ];
});
