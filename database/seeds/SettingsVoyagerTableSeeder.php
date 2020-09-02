<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsVoyagerTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $setting = $this->findSetting('site.nomTeam');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'Nom team',
                'value'        => 'Nom team',
                'details'      => '',
                'type'         => 'text',
                'order'        => 1,
                'group'        => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.discord');
        if (!$setting->exists) {
            $setting->fill([
                'display_name' => 'discord de la team',
                'value'        => 'discord',
                'details'      => '',
                'type'         => 'text',
                'order'        => 2,
                'group'        => 'Site',
            ])->save();
        }
    }

    /**
     * [setting description].
     *
     * @param [type] $key [description]
     *
     * @return [type] [description]
     */
    protected function findSetting($key)
    {
        return Setting::firstOrNew(['key' => $key]);
    }
}
