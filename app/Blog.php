<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Redirect;

class Blog extends Model
{
    protected $table = "blog";
  	// public $timestamps = false;

  	//欄位判斷 開頭要加上 use Validator;
  	static function checkNotNull($input){

  		$rules = [  'title'  => 'required|min:5',
                    'content'=> 'required'
                 ];

        $messages = [
                    'title.required' => '標題欄位不能空白',
                    'content.required' => '內容不能空白',
                    'min'=>'不可小於5個字'
                    ];
        $validator = Validator::make($input, $rules, $messages);  
        return $validator;       
  	}


}
