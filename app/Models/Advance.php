<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];



    public static $rules = array(
        //お名前
        'last_name' => 'required|alpha',
        'first_name' => 'required|alpha',
        //性別
        'gender' => 'required',
        //メールアドレス
        'email' => 'required|email',
        //郵便番号
        'postcode' => 'required|min:8|max:8',
        //住所
        'address' => 'required',
        //建物名
        'building_name' => 'nullabled',
        //ご意見
        'opinion' => 'required|max:120'
    );

    public function getID()
    {
        $txt = $this->id;
        return $txt;
    }
    public function getLast_Name()
    {
        $txt = $this->last_name;
        return $txt;
    }
    public function getFirst_Name()
    {
        $txt = $this->first_name;
        return $txt;
    }
    public function getGender()
    {
        $txt = $this->gender;
        return $txt;
    }
    public function getemail()
    {
        $txt =  $this->email;
        return $txt;
    }
    public function getCreate()
    {
        $txt = $this->create_at;
        return $txt;
    }
    public function getOpnion()
    {
        $txt = $this->opinion;
        return $txt;
    }

}
