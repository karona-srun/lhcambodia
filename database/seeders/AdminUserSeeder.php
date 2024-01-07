<?php

namespace Database\Seeders;

use App\Models\SystemProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Karona', 
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $role = Role::create(['name' => 'Administrator']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        SystemProfile::create([
            'name' => 'LH Cambodia', 
            'email' => 'admin@gmail.com',
            'tel' => '000000000',
            'photo' => 'logo.jpg',
            'address' => 'Phnom Penh, Cambodia',
            'descrip_contract_invoice' => 'descrip contract invoice condition',
            'descrip_contract_quote' => 'descrip contract quote condition',
            'introduct' => 'First words LH Cambodia and Services Co., Ltd. Cambodia would like to send a gift for health and success, the most sincere happiness, and thanks to the entire customer quarter who has been interested, stick with and given us the trust of cooperation throughout the past. Proud to be a supplier of interior materials and advertising materials in Cambodia for over 5 years, LH Cambodia has made continuous efforts to introduce SPC wood-fired plastic flooring products, VPC wood-fired plastic floors, outdoor cladding, artificial lawns, and consulting of office and family furniture solutions tailored to each specific and increasingly diverse needs of the Quarter of Customers..',
            'introduct_km' => 'ពាក្យទីមួយ LH Cambodia and Services Co., Ltd. Cambodia សូមផ្ញើជូននូវកាដូ សុខភាព និងភាពជោគជ័យ សុភមង្គលដ៏ស្មោះស្ម័គ្របំផុត និងសូមអរគុណដល់អតិថិជនទាំងមូលដែលបានចាប់អារម្មណ៍ ប្រកាន់ខ្ជាប់ និងផ្តល់ទំនុកចិត្តលើកិច្ចសហប្រតិបត្តិការគ្រប់ជ្រុងជ្រោយ។ កន្លង​មក​នេះ។ មោទនភាពក្នុងការក្លាយជាអ្នកផ្គត់ផ្គង់សម្ភារខាងក្នុង និងសម្ភារៈផ្សាយពាណិជ្ជកម្មក្នុងប្រទេសកម្ពុជាអស់រយៈពេលជាង 5 ឆ្នាំមកហើយ LH Cambodia បានខិតខំប្រឹងប្រែងជាបន្តបន្ទាប់ដើម្បីណែនាំផលិតផលកម្រាលផ្លាស្ទិកធ្វើពីឈើ SPC កម្រាលផ្លាស្ទិក VPC កម្រាលឈើ កម្រាលខាងក្រៅ ស្មៅសិប្បនិម្មិត និងការប្រឹក្សា។ ដំណោះស្រាយគ្រឿងសង្ហារឹមសម្រាប់ការិយាល័យ និងគ្រួសារ ស្របតាមតម្រូវការជាក់លាក់ និងចម្រុះកាន់តែខ្លាំងឡើងនៃត្រីមាសអតិថិជន។.',
        ]);
    }
}
