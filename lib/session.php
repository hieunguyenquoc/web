<?php

class Session{
 public static function init(){
            session_start();
 }

 public static function set($key, $val)//set gia tri
 {
    $_SESSION[$key] = $val;
 }
//set key thành giá trị

 public static function get($key)//get gia tri
 {
    if (isset($_SESSION[$key])) 
    {
     return $_SESSION[$key];
    } else {
     return false;
    }
 }

 public static function checkSession()
 {
    self::init();// start session
    if (self::get("adminlogin")== false) {
     self::destroy();
     header("Location:login.php");//quay lại trang login
    }
 }
//check phiên làm việc có tồn tại hay không
 public static function checkLogin(){
    self::init();
    if (self::get("adminlogin")== true) {
     header("Location:index.php");
    }
 }

 public static function destroy(){
  session_destroy();
  header("Location:login.php");
 }
 // xóa or hủy phiên làm việc
}
?>
