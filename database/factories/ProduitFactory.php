<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\NameContext;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
     

        $title=fake()->unique->sentence;
        $created_at= fake()->dateTimeBetween("-1year");

        return [
            "title" =>$title,
            "categorie"=>fake()->domainName(),
            "location"=>fake()->city,
            "price"=>fake()->randomDigit(),
            "condition"=>fake()->name,
            "description"=>fake()->paragraph(),
            "created_at"=>$created_at,
            "updated_at"=>$created_at,
            
        ];
    
    }
}
