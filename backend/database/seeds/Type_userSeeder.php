<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Type_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(DB::table('type_users')->count() == 0){
    		$data = [
    			[
    				'name' => 'Aluno',
    				'type_view' => '1',
    				'created_at'        => Carbon::now(),
    				'updated_at'        => Carbon::now(),
    			],
    			[
    				'name' => 'Professor',
    				'type_view' => '2',
    				'created_at'        => Carbon::now(),
    				'updated_at'        => Carbon::now(),
    			],
    			[
    				'name' => 'Administrador',
    				'type_view' => '3',
    				'created_at'        => Carbon::now(),
    				'updated_at'        => Carbon::now(),
    			]
    		];
    		DB::table('type_users')->insert($data);
    	}

    }
}
