<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * @property array|string|null option_value
 * @property array|string|null option_name
 */
class Setting extends Model
{

    protected $fillable = ['option_name', 'option_value'];
    public $timestamps = false;

    public static function get_value($option_name)
    {
        $row = self::where('option_name', $option_name)->first();
        if ($row) {
            return $row->option_value;
        } else {
            return '';
        }
    }

    public static function set_value($data)
    {
        foreach ($data as $key => $value) {
            if ($key != '_token') {
                $row = DB::table('settings')->where('option_name', $key)->update(['option_value' => $value]);
            }
        }
    }
}
