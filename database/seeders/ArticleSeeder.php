<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class ArticleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $firstCategoryId = DB::table('categories')->oldest('id')->value('id');
        $firstUserId = DB::table('users')->oldest('id')->value('id');

        DB::table('articles')->insert([
            [
                'title' => 'Pourquoi tenir un journal de bord numérique',
                'slug' => 'pourquoi-tenir-un-journal-de-bord-numerique',
                'content' => 'Tenir un journal de bord numérique permet de conserver une trace de ses idées, de ses projets et de ses réflexions. En quelques minutes par jour, il devient plus simple de mesurer ses progrès, de retrouver des informations importantes et de prendre du recul sur son évolution. Avec les outils modernes, il est également possible de rechercher rapidement un ancien contenu et de le compléter au fil du temps.',
                'created_at' => Carbon::parse('2026-05-12 09:15:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-05-12 12:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Les bases d\'une organisation efficace',
                'slug' => 'les-bases-d-une-organisation-efficace',
                'content' => 'Une bonne organisation ne consiste pas à remplir chaque minute de la journée mais à définir des priorités. Identifier les tâches importantes, prévoir des plages de concentration et accepter de reporter ce qui est moins urgent permet de travailler plus sereinement. La régularité est souvent plus efficace que les efforts ponctuels.',
                'created_at' => Carbon::parse('2026-05-16 14:30:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-05-16 14:45:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Découvrir les plaisirs de la lecture',
                'slug' => 'decouvrir-les-plaisirs-de-la-lecture',
                'content' => 'La lecture offre un moment de calme tout en stimulant l imagination. Quelques pages chaque jour suffisent pour enrichir ses connaissances, développer son vocabulaire et explorer des univers variés. Le plus important est de choisir des ouvrages qui correspondent réellement à ses centres d intérêt.',
                'created_at' => Carbon::parse('2026-05-21 18:45:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-05-21 22:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Créer des habitudes durables',
                'slug' => 'creer-des-habitudes-durables',
                'content' => 'Mettre en place une nouvelle habitude demande du temps. Commencer par une action simple et répétée chaque jour est souvent plus efficace qu un changement radical. Les progrès sont parfois discrets mais deviennent significatifs lorsqu ils sont maintenus sur plusieurs semaines.',
                'created_at' => Carbon::parse('2026-05-27 08:20:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-05-27 12:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Comment préparer un voyage sereinement',
                'slug' => 'comment-preparer-un-voyage-sereinement',
                'content' => 'Préparer un voyage commence bien avant le départ. Vérifier les documents nécessaires, établir un budget, prévoir un itinéraire flexible et réserver les éléments essentiels permet de réduire le stress. Laisser une place à l imprévu rend également l expérience plus agréable.',
                'created_at' => Carbon::parse('2026-06-02 11:10:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-02 12:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Les avantages du travail en équipe',
                'slug' => 'les-avantages-du-travail-en-equipe',
                'content' => 'Travailler en équipe permet de confronter différents points de vue et de répartir les responsabilités. Une communication claire, des objectifs partagés et une confiance mutuelle favorisent la réussite des projets. Les compétences de chacun deviennent alors complémentaires.',
                'created_at' => Carbon::parse('2026-06-07 16:40:00'),
                'status' => 'DRAFT',
                'published_at' => NULL,
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Prendre le temps de se former',
                'slug' => 'prendre-le-temps-de-se-former',
                'content' => 'La formation continue est un excellent moyen de rester à jour et de développer de nouvelles compétences. Qu il s agisse de livres, de vidéos, de conférences ou de cours en ligne, chaque apprentissage contribue à renforcer la confiance et la capacité à relever de nouveaux défis.',
                'created_at' => Carbon::parse('2026-06-12 10:00:00'),
                'status' => 'DRAFT',
                'published_at' => NULL,
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Pourquoi la curiosité est une qualité',
                'slug' => 'pourquoi-la-curiosite-est-une-qualite',
                'content' => 'Être curieux pousse à poser des questions, à expérimenter et à apprendre constamment. Cette attitude favorise la créativité et aide à mieux comprendre le monde qui nous entoure. Même une simple découverte peut devenir le point de départ d un projet ambitieux.',
                'created_at' => Carbon::parse('2026-06-18 13:25:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-18 17:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Bien débuter un nouveau projet',
                'slug' => 'bien-debuter-un-nouveau-projet',
                'content' => 'Chaque projet commence par une idée. Avant de se lancer, il est utile de clarifier les objectifs, les ressources disponibles et les premières étapes à accomplir. Une planification légère mais réaliste facilite le passage à l action et permet d ajuster la stratégie au fil du temps.',
                'created_at' => Carbon::parse('2026-06-23 09:50:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-23 12:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
            [
                'title' => 'Trouver un équilibre entre vie personnelle et travail',
                'slug' => 'trouver-un-equilibre-entre-vie-personnelle-et-travail',
                'content' => 'Maintenir un équilibre entre les obligations professionnelles et les activités personnelles demande une attention régulière. Prévoir des moments de repos, préserver du temps pour ses proches et savoir déconnecter favorisent une meilleure qualité de vie et une motivation durable.',
                'created_at' => Carbon::parse('2026-06-29 17:05:00'),
                'status' => 'PUBLISHED',
                'published_at' => Carbon::parse('2026-06-29 19:05:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId
            ],
        ]);
    }
}
