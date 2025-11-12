<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Contact::create([
        'category_id' => 1,
        'first_name' => '山田',
        'last_name' => '太郎',
        'gender' => 1,
        'email' => 'test@example.com',
        'tel' => '080-1234-5678',
        'address' => '東京都渋谷区千駄ヶ谷1-2-3',
        'building' => '千駄ヶ谷マンション101',
        'detail' => 'お問い合わせ内容をご記載ください'
       ]);    
    }
}
