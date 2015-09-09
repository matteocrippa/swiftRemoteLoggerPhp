<?php

/*
  swiftRemoteLoggerPhp

  Write down to disk each call in a separate log file with timestamp name
*/

header('Content-disposition: attachment; filename=response.json');
header('Content-type: application/json');

$password = 'password';

$path = 'logs/';

if($_POST['password'] == $password){

  if($_POST['data']){

    $data = $_POST['data'];
    $udid = $_POST['udid'];
    $app = $_POST['app'];

    if (!file_exists($path.$app)) {
      mkdir($path.$app, 0777, true);
    }

    file_put_contents($path.$app.'/'.$udid.'.log', $data);

    echo json_encode(array('ok'=>'logged'));

  }else{
    echo json_encode(array('error'=>'missing data'));
  }


}else{
  echo json_encode(array('error'=>'wrong password'));
}
