<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(StoresTableSeeder::class);
        // $this->call(AddressesTableSeeder::class);
        // $this->call(ElementsTableSeeder::class);
        // $this->call(CampaignsTableSeeder::class);
        // $this->call(StoreElementsTableSeeder::class);
        $this->call(MedidasTableSeeder::class);
    }
}
