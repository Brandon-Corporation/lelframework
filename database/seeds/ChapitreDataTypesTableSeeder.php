<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class ChapitreDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'chapitres');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'chapitres',
                'display_name_singular' => 'Chapitre',
                'display_name_plural'   => 'Chapitres',
                'icon'                  => '',
                'model_name'            => 'Bcorp\\Lelframework\\Chapitre',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        if ($dataType->exists) {
            $dataType->update([
                'model_name' => 'Bcorp\\Lelframework\\Chapitre',
                'controller' => '',
            ]);
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
