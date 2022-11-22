<?php

namespace Database\Factories;
use App\Models\Gerencia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\gerencia>
 */
class GerenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'siglas' => fake()->sentence(),
            'descripcion' => fake()->paragraph(),
            'created_at'=> fake()->timezone(),
            'updated_at'=> fake()->timezone(),
            
            
        ];
    }
}
