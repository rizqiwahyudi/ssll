<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'fullname' => 'Admin SSL',
            'date_of_birth' => '2000-08-17',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'S2',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '01.092021.0001',
            'phone' => '087850987679',
            'departement_id' => '1'

        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

        $spv = User::create([
            'username' => 'Arif',
            'email' => 'hidayatarif690@gmail.com',
            'password' => bcrypt('12345678'),
            'fullname' => 'Arif Hidayat',
            'date_of_birth' => '2000-01-25',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'D2',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '02.092021.0001',
            'phone' => '087702029102',
            'departement_id' => '1'

        ]);

        $role = Role::create(['name' => 'supervisor']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $spv->assignRole([$role->id]);

        $user = User::create([
            'username' => 'dhani',
            'email' => 'dhani@alton.net',
            'password' => bcrypt('12345678'),
            'fullname' => 'Moh Ainur Romadhani',
            'date_of_birth' => '2001-08-17',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'D2',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '03.092021.0001',
            'phone' => '085548909856',
            'departement_id' => '1'
        ]);

        $role = Role::create(['name' => 'user']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user = User::create([
            'username' => 'dayat',
            'email' => 'dayat@alton.net',
            'password' => bcrypt('12345678'),
            'fullname' => 'Arif Hidayat',
            'date_of_birth' => '2001-08-17',
            'place_of_birth' => 'Sumenep',
            'gender' => 'Male',
            'address' => 'Sumenep',
            'last_education' => 'D2',
            'date_of_entry' => '2021-08-18',
            'registration_number' => '03.092021.0002',
            'phone' => '085548909856',
            'departement_id' => '2'
        ]);

        $user->assignRole('user');
    }
}
