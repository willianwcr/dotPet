<?php
  LOG::send('logoff');
  callApi('GET', 'https://api.willianwcr.com.br/logoff', array(
    'token' => $_COOKIE['SNID']
  ));
  setcookie("SNID", null, -1, '/');
  setcookie("SNID_", null, -1, '/');
  header('Location: /login');
?>
