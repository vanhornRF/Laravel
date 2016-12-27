<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('band')->insert([

            [
                'name' => "Rolling Stones",
                'start_date' => \Carbon\Carbon::createFromDate(1962,07,12)->toDateTimeString(),
                'website' => 'http://www.rollingstones.com/',
                'still_active' => TRUE,
            ],
            [
                'name' => "The Who",
                'start_date' => \Carbon\Carbon::createFromDate(1964,02,17)->toDateTimeString(),
                'website' => 'http://www.thewho.com/',
                'still_active' => TRUE,
            ],
        ]);

        $stones_id = DB::table('band')
                                ->select('id')
                                ->where('name', 'Rolling Stones')
                                ->first()
                                ->id;

        $who_id = DB::table('band')
                                ->select('id')
                                ->where('name', 'The Who')
                                ->first()
                                ->id;

        DB::table('album')->insert([

            [
            	'band_id' => $stones_id,
                'name' => "Beggars Banquet",
                'recorded_date' => \Carbon\Carbon::createFromDate(1968,7,12)->toDateTimeString(),
                'release_date' => \Carbon\Carbon::createFromDate(1968,12,6)->toDateTimeString(),
                'number_of_tracks' => 10,
                'label' => "Decca",
                'producer' => "Jimmy Miller",
                'genre' => "Roots rock",
            ],
            [
            	'band_id' => $stones_id,
                'name' => "Aftermath",
                'recorded_date' => \Carbon\Carbon::createFromDate(1965,12,8)->toDateTimeString(),
                'release_date' => \Carbon\Carbon::createFromDate(1966,4,15)->toDateTimeString(),
                'number_of_tracks' => 14,
                'label' => "Decca",
                'producer' => "Andrew Loog Oldham",
                'genre' => "Electric blues",
            ],
            [
            	'band_id' => $who_id,
                'name' => "Who's Next",
                'recorded_date' => \Carbon\Carbon::createFromDate(1971,6,19)->toDateTimeString(),
                'release_date' => \Carbon\Carbon::createFromDate(1971,8,14)->toDateTimeString(),
                'number_of_tracks' => 9,
                'label' => "Decca",
                'producer' => "Glyn Johns",
                'genre' => "Hard rock",
            ],
            [
            	'band_id' => $who_id,
                'name' => "Tommy",
                'recorded_date' => \Carbon\Carbon::createFromDate(1969,3,7)->toDateTimeString(),
                'release_date' => \Carbon\Carbon::createFromDate(1969,5,23)->toDateTimeString(),
                'number_of_tracks' => 24,
                'label' => "Decca",
                'producer' => "Kit Lambert",
                'genre' => "Hard rock",
            ],

        ]);
    }
}
