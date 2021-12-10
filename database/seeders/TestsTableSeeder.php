<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Advance;

//use Database\Factories\AdvanceFactory;
//use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        $param = [
            'fullname' => '山田太郎',
            'gender' => 1,
            'email' => 'test@example.com',
            'postcode' => '123-456',
            'addres' => '東京都渋谷区千駄ヶ谷1-2-3',
            'building_name' => '千駄ヶ谷マンション101',
            'opinion' => 'いつもお世話になっております。先日、貴社製品を購入させていただきました。この度、不具合が生じ、説明書に沿って操作を進めていましたが上手くいきませんでした。どのように直せば良いかご教授いただきたいです。'
        ];
        DB::table('tests')->insert($param);
        */
        //Advance::factory()->count(3)->create();
    }
}
