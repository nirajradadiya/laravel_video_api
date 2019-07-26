<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use App\Models\VideosCreator;
use App\Models\VideosMetaData;
use App\Helpers\CommonApiHelper;
use App\Helpers\MailSendHelper;
use Auth,Hash,Input,Session,Redirect,Mail,URL,Str,Config,DB,Response,View;
class VideoController extends ApiBaseController
{

  /*
    @Description: Function for Give Total Video Size
    @Author: Niraj
    @Output: - return users videos total size
    @Date: 26-07-2019
  */
  public function getTotalVideoSize() 
  {
    try
    {
      $flag = true;
      $code = SUCCESS;
      $msg = MSG_SUCCESS;
      $http_code = HTTP_SUCCESS;
      $parameter = Input::all();
      $response = array();
      if(count($parameter))
      {
        if(isset($parameter['user_name']) && !empty($parameter['user_name']))
        { 
          $videoIds = VideosCreator::where('user_name',$parameter['user_name'])->pluck('video_id')->toArray();
          if(count($videoIds))
          {
            $response['total_size_of_videos'] = VideosMetaData::whereIn('id',$videoIds)->sum('video_size_in_mb');
          }
          else
          {
            $response['total_size_of_videos'] = 0;
          }
        }
        else
        {
          $code  = PASS_INPUT_PARAMETER_USERNAME;
          $msg   = MSG_PASS_INPUT_PARAMETER_USERNAME;
          $flag  = false;
        }
      }
      else
      {
        $code  = PASS_INPUT_PARAMETER;
        $msg   = MSG_PASS_INPUT_PARAMETER;
        $flag  = false;
      }
    }
    catch (\Exception $e) {
        $response = array();
        $code = ERROR_IN_API_LARAVEL_TRY_CATCH;
        $msg = $e->getMessage(); 
    }
    if($code != SUCCESS)
    {
      $response = (object)$response;
    }
    return response(array('code' => $code,'msg' => $msg,"flag"=>$flag,'data' => $response),$http_code);
  }

  /*
    @Description: Function for Give Video Metadata
    @Author: Niraj
    @Output: - return videos metadata detail
    @Date: 26-07-2019
  */
  public function getVideoMetaData($videoid) 
  {
    try
    {
      $flag = false;
      $code = UNSUCCESS;
      $msg = MSG_UNSUCCESS;
      $http_code = HTTP_SUCCESS;
      $parameter = Input::all();
      $response = array();
      if($videoid > 0)
      {
        $videoDetail = VideosCreator::where('video_id',$videoid)->first();
        if(!empty($videoDetail))
        {
          $videoMetaDataDetail = VideosMetaData::where('id',$videoid)->first(['id','video_size_in_mb','viewers_count']);
          $videoMetaDataDetail->user_name = $videoDetail->user_name;
          $response['video_metadata'] = $videoMetaDataDetail;
          $code = SUCCESS;
          $msg  = MSG_SUCCESS;
          $flag = true;
              
        }
        else
        {
          $code  = PASS_VALID_VIDEO_ID;
          $msg   = MSG_PASS_VALID_VIDEO_ID;
          $flag  = false;
        }
      }
      else
      {
        $code  = PASS_VALID_VIDEO_ID;
        $msg   = MSG_PASS_VALID_VIDEO_ID;
        $flag  = false;
      }
    }
    catch (\Exception $e) {
        $response = array();
        $code = ERROR_IN_API_LARAVEL_TRY_CATCH;
        $msg = $e->getMessage(); 
    }
    if($code != SUCCESS)
    {
      $response = (object)$response;
    }
    return response(array('code' => $code,'msg' => $msg,"flag"=>$flag,'data' => $response),$http_code);
  }

  /*
    @Description: Function for updates Video size and Viewers Count
    @Author: Niraj
    @Output: - return videos metadata by Video ID
    @Date: 26-07-2019
  */
  public function updateVideoSizeViewers($videoid) 
  {
    try
    {
      $flag = false;
      $code = UNSUCCESS;
      $msg = MSG_UNSUCCESS;
      $http_code = HTTP_SUCCESS;
      $parameter = Input::all();
      $response = array();
      
      if(count($parameter))
      {
        if(isset($parameter['video_size_in_mb']) && !empty($parameter['video_size_in_mb']))
        {
          if(isset($parameter['viewers_count']) && !empty($parameter['viewers_count']))
          {       
            $videoDetail = VideosMetaData::where('id',$videoid)->first();
            if(!empty($videoDetail))
            {
              if(VideosMetaData::update_using_array($parameter,$videoDetail))
              {    
                $response['video_metadata'] = $videoDetail;
                $code = SUCCESS;
                $msg = MSG_UPDATE_VIDEO_META_DATA;
                $flag = true;
              }
            }
            else
            {
              $code = PASS_VALID_VIDEO_ID;
              $msg  = MSG_PASS_VALID_VIDEO_ID;
            }
          }
          else
          {
            $code  = PASS_INPUT_PARAMETER_VIDEOVIEWER_COUNT;
            $msg   = MSG_PASS_INPUT_PARAMETER_VIDEOVIEWER_COUNT;
            $flag  = false;
          }
        }
        else
        {
          $code  = PASS_INPUT_PARAMETER_VIDEOSIZE;
          $msg   = MSG_PASS_INPUT_PARAMETER_VIDEOSIZE;
          $flag  = false;
        }
      }
      else
      {
        $code  = PASS_INPUT_PARAMETER;
        $msg   = MSG_PASS_INPUT_PARAMETER;
        $flag  = false;
      }
    }
    catch (\Exception $e) {
        $response = array();
        $code = ERROR_IN_API_LARAVEL_TRY_CATCH;
        $msg = $e->getMessage(); 
    }
    if($code != SUCCESS)
    {
      $response = (object)$response;
    }
    return response(array('code' => $code,'msg' => $msg,"flag"=>$flag,'data' => $response),$http_code);
  }


}
  