<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modules')->delete();
        
        \DB::table('modules')->insert(array (
            0 => 
            array (
                'id' => 2996646379,
                'name' => 'programme',
                'slug' => 'programme',
                'deleted_at' => NULL,
                'created_at' => '2025-05-21 09:26:34',
                'updated_at' => '2025-05-21 09:26:34',
            ),
            1 => 
            array (
                'id' => 12300199591,
                'name' => 'tableau de bord',
                'slug' => 'tableau-de-bord',
                'deleted_at' => NULL,
                'created_at' => '2025-04-23 09:06:13',
                'updated_at' => '2025-04-23 09:06:13',
            ),
            2 => 
            array (
                'id' => 12858288361,
                'name' => 'slide',
                'slug' => 'slide',
                'deleted_at' => NULL,
                'created_at' => '2025-05-23 08:41:04',
                'updated_at' => '2025-05-23 08:41:04',
            ),
            3 => 
            array (
                'id' => 14995762341,
                'name' => 'biographie',
                'slug' => 'biographie',
                'deleted_at' => NULL,
                'created_at' => '2025-05-21 09:26:21',
                'updated_at' => '2025-05-21 09:26:21',
            ),
            4 => 
            array (
                'id' => 15348439051,
                'name' => 'actualite',
                'slug' => 'actualite',
                'deleted_at' => NULL,
                'created_at' => '2025-05-21 12:51:20',
                'updated_at' => '2025-05-21 12:51:20',
            ),
            5 => 
            array (
                'id' => 15913568981,
                'name' => 'chantier',
                'slug' => 'chantier',
                'deleted_at' => NULL,
                'created_at' => '2025-05-21 09:26:28',
                'updated_at' => '2025-05-21 09:26:28',
            ),
        ));
        
        
    }
}