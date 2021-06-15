<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
/*
App\Notice Object ( [table:protected] => _main_notice [primaryKey:protected] => idx [timestamps] => [connection:protected] => mysql [keyType:protected] => int [incrementing] => 1 [with:protected] => Array ( ) [withCount:protected] => Array ( ) [perPage:protected] => 15 [exists] => 1 [wasRecentlyCreated] => [attributes:protected] => Array ( [idx] => 27 [subject] .....
*/
    protected $table = '_main_notice'; 
    protected $primaryKey = 'idx'; // 기본 pk가 id로 되어있는걸 변경
    public $timestamps = false;
    
}

