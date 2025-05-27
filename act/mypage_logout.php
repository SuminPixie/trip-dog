<?php
  session_start();            // 세션 시작
  session_unset();            // 모든 세션 변수 제거
  session_destroy();          // 세션 완전 삭제

  // 로그아웃 후 이동할 페이지
  header("Location: ../index.php");
  exit;
?>
