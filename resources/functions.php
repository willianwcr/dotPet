<?php

  function isLogged(){
      if(isset($_COOKIE['SNID'])){
        if(isset($_COOKIE['SNID_'])){

        }else{
          $response = json_decode(callApi('GET', 'http://api.willianwcr.com.br/auth/token/new', array(
              'oldtoken' => $_COOKIE['SNID'],
              'user_id' => USER::getUserId()
          )));
          if(!$response->error){
            $token = $response->token;
            setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
            setcookie('SNID_', '1', time() + 60 * 60 * 24, '/', NULL, NULL, TRUE);
          }else {
            echo "erro";
          }
        }
        $response = json_decode(callApi('GET', 'http://api.willianwcr.com.br/auth/token', array('token' => $_COOKIE['SNID'])));
        if($response->status == 'token accepted'){
          return true;
        }else{
          setcookie("SNID", null, -1, '/');
          setcookie("SNID_", null, -1, '/');
          return false;
        }
      }else{
        return false;
      }
  }

  function installCss($key){
    echo '<link rel="stylesheet" href="'.$key.'">';
  }
  function installJs($key){
    echo '<script src="'.$key.'"></script>';
  }

  function ifUrlSelected($key){
    if(url($key)){
      return 'mdc-persistent-drawer--selected';
    }else{
      return '';
    }
  }
?>
