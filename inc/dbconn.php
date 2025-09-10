<?php
  // db연결 변수설정
  $mysql_host='localhost'; //호스트명
  $mysql_user='root'; //로컬 사용자명
  $mysql_password=''; //로컬 패스워드
  //$mysql_user='pixiesite'; //cafe24사용자명
  //$mysql_password='p03010301'; //cafe24패스워드
  $mysql_db='pixiesite'; //데이터베이스명
  
  //데이터베이스에 연결
  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
  
  if(!$conn){
    die('연결실패 : ' .mysqli_connect_error());
  }

  ini_set('display_errors', 'On');

  session_start(); //세션 시작



?>