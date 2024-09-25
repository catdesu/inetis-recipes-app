<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cake = Recipe::where('title', 'Gâteau aux pommes moelleux')->first();
        $beetroot = Recipe::where('title', 'Gaspacho de betterave')->first();
        $tart = Recipe::where('title', 'Tarte aux figues')->first();

        DB::table('steps')->insert([
            [
                'fk_recipes_id' => $cake->id,
                'title' => 'Préchauffage du four',
                'description' => 'Préchauffez le four à 160°. (thermostat 5-6)',
                'step_number' => 1,
                'prep_time' => null
            ],
            [
                'fk_recipes_id' => $cake->id,
                'title' => 'Préparation des pommes',
                'description' => 'Pelez les pommes et les coupez en fines lamelles.',
                'step_number' => 2,
                'prep_time' => 5
            ],
            [
                'fk_recipes_id' => $cake->id,
                'title' => 'Préparation de l\'appareil',
                'description' => 'Mélangez les oeufs et le sucre puis mélangez la levure et la farine.',
                'step_number' => 3,
                'prep_time' => 5
            ],
            [
                'fk_recipes_id' => $cake->id,
                'title' => null,
                'description' => 'Faites ramollir le beurre (au four à micro-ondes, pendant quelques secondes si besoin) et mélangez tous les ingrédients ensemble, avec les pommes.',
                'step_number' => 4,
                'prep_time' => 5
            ],
            [
                'fk_recipes_id' => $cake->id,
                'title' => 'Cuisson',
                'description' => 'Beurrez un moule et déposez le mélange dans ce moule. Faites cuire au four pendant environ 35 à 40 minutes, ou jusqu\'à ce que le gâteau soit doré et qu\'un couteau inséré en son centre en ressorte propre.',
                'step_number' => 5,
                'prep_time' => 40
            ],
            [
                'fk_recipes_id' => $beetroot->id,
                'title' => null,
                'description' => 'Épépinez et épluchez le concombre. Coupez-le en gros morceaux, ainsi que les betteraves et l\'oignon et l\'ail épluchés. Mixez.',
                'step_number' => 1,
                'prep_time' => 5
            ],
            [
                'fk_recipes_id' => $beetroot->id,
                'title' => null,
                'description' => 'Ajoutez le formage blanc et le vinaigre. Salez et poivrez, puis ajoutez quelques gouttes de Tabasco. Rectifiez l\'assaisonnement si besoin et mettez au frigo pour au moins 30 minutes.',
                'step_number' => 2,
                'prep_time' => 30
            ],
            [
                'fk_recipes_id' => $beetroot->id,
                'title' => null,
                'description' => 'Faites griller la poitrine fumée sur une plaque recouverte de papier sulfurisé pendant 15 minutes à 200°C jusqu\'à ce qu\'elle soit bien colorée, puis faites-la refroidir. Mixez-la grossièrement pour en faire une petite chapelure.',
                'step_number' => 3,
                'prep_time' => 15
            ],
            [
                'fk_recipes_id' => $beetroot->id,
                'title' => 'Pour finir',
                'description' => 'Beurrez un moule et déposez le mélange dans ce moule. Faites cuire au four pendant environ 35 à 40 minutes, ou jusqu\'à ce que le gâteau soit doré et qu\'un couteau inséré en son centre en ressorte propre.',
                'step_number' => 4,
                'prep_time' => null
            ],
            [
                'fk_recipes_id' => $tart->id,
                'title' => null,
                'description' => 'Faire chauffer une poêle, y ajouter les figues équeutées et coupées en 2 (ou 4 suivant la grosseur), puis le sucre. Faire caraméliser 5 minutes.',
                'step_number' => 1,
                'prep_time' => 5
            ],
            [
                'fk_recipes_id' => $tart->id,
                'title' => null,
                'description' => 'Dans un saladier, mélanger la crème, l\'oeuf, la cassonade et la cannelle.',
                'step_number' => 2,
                'prep_time' => 5
            ],
            [
                'fk_recipes_id' => $tart->id,
                'title' => null,
                'description' => 'Ajouter les figues à cette préparation.',
                'step_number' => 3,
                'prep_time' => null
            ],
            [
                'fk_recipes_id' => $tart->id,
                'title' => null,
                'description' => 'Disposer la pâte dans un moule à tarte. Y verser le contenu du saladier.',
                'step_number' => 4,
                'prep_time' => null
            ],
            [
                'fk_recipes_id' => $tart->id,
                'title' => 'Pour finir',
                'description' => 'Cuire à 180°C (thermostat 6) pendant 35 à 40 minutes.',
                'step_number' => 5,
                'prep_time' => 40
            ],
        ]);
    }
}
