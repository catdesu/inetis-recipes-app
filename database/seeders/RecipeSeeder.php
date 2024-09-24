<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            'fk_users_id' => 1,
            'title' => 'Gâteau aux pommes moelleux',
            'description' => 'Découvrez notre recette facile de gâteau aux pommes, moelleux et léger, inspirée des recettes de grand-mère. Essayez également la version avec des pommes caramélisées pour une touche gourmande supplémentaire. Ce gâteau traditionnel ravira tous les amateurs de desserts aux pommes.',
            'image' => 'images/apple-cake.webp',
        ]);
        
        DB::table('recipes')->insert([
            'fk_users_id' => 1,
            'title' => 'Gaspacho de betterave',
            'description' => 'Une entrée très étonnante, légère et très fraîche ! A essayer.',
            'image' => 'images/beetroot-gazpacho.webp',
        ]);
        
        DB::table('recipes')->insert([
            'fk_users_id' => 1,
            'title' => 'Tarte aux figues',
            'description' => 'Découvrez cette recette familiale de tarte aux figues toute simple. J\'utilise une pâte feuilletée ou brisée. C\'est une recette parfaite pour un pique-nique estival ou automnal.',
            'image' => 'images/fig-tart.webp',
        ]);
    }
}
