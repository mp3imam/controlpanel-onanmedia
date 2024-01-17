<?php

namespace Database\Factories;

use App\Helpers\IdStringRandom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserPublicModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'                => IdStringRandom::stringRandom(),
            'name'              => $this->faker->name(),
            'username'          => $this->faker->userName(),
            'email'             => $this->faker->email(),
            'phone'             => $this->faker->phoneNumber(),
            'password'          => '$2b$10$hR4j6R05uJ7cPcQaYwoVqe5FKScbW/ynvcbTE3XRgVyF4gaYxxi76',
            'msPekerjaanId'     => 'Freelancer',
            'description'       => $this->faker->text(),
            'dateBirth'         => $this->faker->date(),
            'ktp'               => $this->faker->imageUrl(),
            'selfieKtp'         => $this->faker->imageUrl(),
            'image'             => $this->faker->imageUrl(),
            'gender'            => 'L',
            'msMerchantLevelId' => 1,
            'msKotaId'          => 1,
            'msProvinsiId'      => 1,
            'phonePrefix'       => '+62',
            'isEmailVerified'   => 1,
            'sellerStatus'      => 1,
        ];
    }
}
