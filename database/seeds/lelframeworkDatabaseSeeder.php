<?php

use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeder;

class lelframeworkDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('lelframeworkMenuDataRowsTableSeeder');
        $this->seed('SettingsVoyagerTableSeeder');
        $this->seed('ChapitreDataTypesTableSeeder');
        $this->seed('ChapitrePermissionsTableSeeder');
        $this->seed('ChapitrePermissionRoleTableSeeder');
    }
}
