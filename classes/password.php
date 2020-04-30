<?php include '../helpers/format.php'?>
<?php include '../lib/database.php'?>
<?php
class pass{
    private $db;
    private $fm;
    public function __construct()
    {
      $this->db=new Database();
      $this->fm=new Format();  
    }
public function updatePass($data){
 $oldpass=mysqli_real_escape_string($this->db->link,$data['oldpass']);
 $newpass=mysqli_real_escape_string($this->db->link,$data['newpass']);
 if($oldpass==""||$newpass=="")
 {
    $alert = "<span class='error'>Không được để trống </span>";
    return $alert;  
 }
 else{
 $query="select *from tbl_admin where adminPass='$oldpass'";
 $result=$this->db->select($query);
 if($result)
 {
 $query="update tbl_admin set adminPass='$newpass'";
 $result=$this->db->update($query);
 if($result)
 {
    $alert = "<span class='success'>Đổi mật khẩu thành công</span>";
    return $alert;
 }
 else
 {
    $alert = "<span class='error'>Đổi mật khẩu thất bại</span>";
    return $alert;
 }
}
else
{
    $alert = "<span class='error'>Mật khẩu cũ không đúng</span>";
    return $alert;
}
}}
}
?>