<?php
namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar permissions
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage about',
            'manage appointments',
            'manage hero section',
        ];

        // Membuat permissions jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Membuat role design manager dan menambahkan permissions
        $designManagerRole = Role::firstOrCreate(['name' => 'design-manager']);
        $designManagerPermissions = [
            'manage products',
            'manage principles',
            'manage testimonials',
        ];

        $designManagerRole->syncPermissions($designManagerPermissions);

        // Membuat role super admin
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);

        // Membuat user dan memberikan role super-admin
        $user = User::create([
            'name' => 'ShaynaComp',
            'email' => 'super@admin.com',
            'password' => bcrypt('123123123'),
        ]);

        $user->assignRole($superAdminRole);
    }
}
