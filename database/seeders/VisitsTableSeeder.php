<?php
namespace Database\Seeders;
use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Shetabit\Visitor\Models\Visit;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        // Get all users
        $users = User::all();

        // Loop through each day for the past 3 years
        $date = now()->subYears(3)->startOfDay();
        $endDate = now()->startOfDay();
        while ($date->lte($endDate)) {

            // Generate a random number of visits for this day
            $numVisits = rand(10, 50);

            // Create visits for each user
            foreach ($users as $user) {
                // Create the visits for this user
                for ($i = 0; $i < $numVisits; $i++) {
                    $visit = new Visit();
                    $visit->method = $faker->randomElement(['GET', 'POST', 'PUT', 'DELETE']);
                    $visit->request = json_encode(['key' => 'value']);
                    $visit->url = $faker->url;
                    $visit->referer = $faker->url;
                    $visit->languages = json_encode(['en', 'fr', 'de']);
                    $visit->useragent = $faker->userAgent;
                    $visit->headers = json_encode(['key' => 'value']);
                    $visit->device = $faker->randomElement(['desktop', 'mobile', 'tablet']);
                    $visit->platform = $faker->randomElement(['Windows', 'MacOS', 'Linux']);
                    $visit->browser = $faker->randomElement(['Chrome', 'Firefox', 'Safari']);
                    $visit->ip = $faker->ipv4;
                    $visit->visitor()->associate($user);
                    $visit->visitable_type = get_class($user);
                    $visit->visitable_id = $user->id;
                    $visit->created_at = Carbon::now()->subYears(3)->addDays(rand(0, 1095))->addMinutes(rand(0, 1439));

                    $visit->save();
                }
            }

            // Move on to the next day
            $date->addDay();
        }
    }
}
