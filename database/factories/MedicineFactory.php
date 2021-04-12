<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;



    public function definition()
    {
        return [
            'medName' => $this->faker->medName,
            'batchNo' => $this->faker->unique()->batchNo,
            'expiryDate' => $this->faker->expiryDate,
            'assignedTo' => $this->faker->assignedTo,
        ];
    }

}    