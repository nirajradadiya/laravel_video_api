<?php
namespace App\Models;
use App\Models\OcModel;
use Illuminate\Database\Eloquent\Model;
class VideosMetaData extends OcModel
{
    public $timestamps = true;
    protected $table = 'videos_metadata';    
    public static function get_videos_metadata_details_with_where($key_value_array) {
        return self::where($key_value_array)
                   ->first();
    }

    public static function get_videos_metadata_with_where($key_value_array) {
        return self::where($key_value_array)->orderby('id','desc')->get();
    }

}
