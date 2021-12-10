<?php

namespace Database\Factories;

use App\Models\Advance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advance::class;

    // 参照させたいSQLのテーブル名を指定
    //protected $table = 'tests';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //お名前
            'first_name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastname(),
            //性別
            'gender' => $this->faker->numberBetween(1, 2),
            //メールアドレス
            'email' => $this->faker->safeEmail(),
            //郵便番号
            'postcode' => $this->faker->postcode(),
            //住所
            'address' => $this->faker->address(),
            //建物名
            'building_name' => $this->faker->secondaryAddress(),
            //ご意見
            'opinion' => $this->faker->realText(60)
        ];
    }
}
