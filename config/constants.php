<?php
// API CONSTANTS START


//Route File Constants
define('API_V1_PREFIX',"v1.0");
define('API_ROUTE_PREFIX',"api");

define('CURRENT_DATE_TIME',date('Y-m-d H:i:s'));
define('CURRENT_DATE_TIME_FORMAT','Y-m-d H:i:s');
define('CURRENT_DATE_FORMAT','Y-m-d');
define('CURRENT_DATE_DISPLAY_FORMAT','d-m-Y');
define('CURRENT_DATE',date('Y-m-d'));
define('CURRENT_DATE_DISPLAY',date('d-m-Y'));


/* Api All Code */
define("SUCCESS", 100);  //sucess
define("UNSUCCESS", 101); //unsuccess

define("PASS_INPUT_PARAMETER",120);
define("PASS_INPUT_PARAMETER_USERNAME",121);
define("PASS_INPUT_PARAMETER_VIDEOVIEWER_COUNT",122);
define("PASS_INPUT_PARAMETER_VIDEOSIZE",123);


define("INVALID_API_URL",130);
define("PASS_VALID_VIDEO_ID",131);

/*Api All HTTP Code */

define("HTTP_UNAUTHORIZED",401);
define("HTTP_SUCCESS",200);
define("HTTP_NOT_FOUND",404);
define("HTTP_INTERNAL_SERVER_ERROR",500);


/* Api All Msg */
define("MSG_SUCCESS", "Success");  //sucess
define("MSG_UNSUCCESS", "Unsuccess"); //unsuccess
define("MSG_PASS_INPUT_PARAMETER","Please pass input parameter");
define("MSG_PASS_INPUT_PARAMETER_USERNAME","Please pass username");
define("MSG_PASS_INPUT_PARAMETER_VIDEOVIEWER_COUNT","Please pass viewer count");
define("MSG_PASS_INPUT_PARAMETER_VIDEOSIZE","Please pass video size");


define("MSG_INVALID_API_URL","Please pass valid api url");
define("MSG_PASS_VALID_VIDEO_ID","Please pass valid video id");



//sucess msg list
define("ERROR_IN_API_LARAVEL_TRY_CATCH","Something went wrong in api");
define("MSG_VIDEO_META_DATA_UPDATE_SUCCESSFULLY","Video meta data update successfully.");
define("MSG_VIDEO_META_DATA_UPDATE_NOT_SUCCESSFULLY","Video meta data not update successfully."); 
define("MSG_UPDATE_VIDEO_META_DATA","Update video meta data successfully.");

//no data found msg list




// API CONSTANTS END

  function  pr($arr) {
      echo "<pre>";
      print_r($arr);
      echo "</pre>";    
  }
?>