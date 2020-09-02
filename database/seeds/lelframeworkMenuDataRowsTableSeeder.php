<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class lelframeworkMenuDataRowsTableSeeder extends Seeder
{
    public function run()
    {
        $this->createMainMenu();
    }

    protected function createMainMenu()
    {
        // Create a new menu
        Menu::firstOrCreate([
            'name' => 'site',
        ]);
        $menu = Menu::where('name', 'site')->firstOrFail();

        // Fill out that menu
        $this->createMenuItem($menu->id, 'Accueil', '/', 1);
        $this->createMenuItem($menu->id, 'Projet en cours', '/encours', 2);
        $this->createMenuItem($menu->id, 'Projet en pause', '/enpause', 3);
    }

    protected function createMenuItem($menuId, $title, $url, $order, $target = '_self', $icon = '')
    {
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menuId,
            'title' => $title,
            'url' => $url,
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => $target,
                'icon_class' => $icon,
                'color' => null,
                'parent_id' => null,
                'order' => $order,
            ])->save();
        }

        return $menuItem;
    }
}
