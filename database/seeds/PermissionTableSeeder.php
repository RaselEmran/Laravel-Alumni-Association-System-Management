<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run() {
		$data = [
			['name' => 'user.view'],
			['name' => 'user.create'],
			['name' => 'user.update'],
			['name' => 'user.delete'],

			['name' => 'language.view'],
			['name' => 'language.create'],
			['name' => 'language.update'],
			['name' => 'language.delete'],

			['name' => 'role.view'],
			['name' => 'role.create'],
			['name' => 'role.update'],
			['name' => 'role.delete'],

			['name' => 'slider.view'],
			['name' => 'slider.create'],
			['name' => 'slider.update'],
			['name' => 'slider.delete'],

			['name' => 'gallery.view'],
			['name' => 'gallery.create'],
			['name' => 'gallery.delete'],

			['name' => 'team.view'],
			['name' => 'team.create'],
			['name' => 'team.update'],
			['name' => 'team.delete'],

			['name' => 'abount.view'],
			['name' => 'abount.create'],

			['name' => 'alumni.view'],
			['name' => 'alumni.create'],
			['name' => 'alumni.update'],
			['name' => 'alumni.delete'],

			['name' => 'category.view'],
			['name' => 'category.create'],
			['name' => 'category.update'],
			['name' => 'category.delete'],

			['name' => 'messege.view'],
			['name' => 'messege.create'],

			['name' => 'apply.view'],


		    ['name' => 'mail.view'],
			['name' => 'mail.create'],

			['name' => 'invitation.view'],
			['name' => 'invitation.create'],


			['name' => 'depertment.view'],
			['name' => 'depertment.create'],
			['name' => 'depertment.update'],
			['name' => 'depertment.delete'],

			['name' => 'picklist.view'],
			['name' => 'picklist.create'],
			['name' => 'picklist.update'],
			['name' => 'picklist.delete'],

			['name' => 'database.create'],
			['name' => 'dashboard.view'],

		];

		$insert_data = [];
		$time_stamp = Carbon::now();
		foreach ($data as $d) {
			$d['guard_name'] = 'web';
			$d['created_at'] = $time_stamp;
			$insert_data[] = $d;
		}
		Permission::insert($insert_data);
	}
}
