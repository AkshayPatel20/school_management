<?php

class adminlogin extends CI_Model{

    public function isvalidate($username,$password){
        $login_query =  $this->db->query("select * from admin_tb where ad_email = '$username' AND ad_password = '$password'");
      
        if($login_query->num_rows()){
            return $login_query->row()->ad_id;
        }
        else{
            return false;
        }

    }//isvalidate close

    public function studentlist(){
        $fetch_student = $this->db->query("select * from student_db order by student_class");

        return $fetch_student->result();
        
    }
    
    public function delstud($id){
        $delst = $this->db->query("DELETE from student_db where student_id = '$id'");
        return $delst;

    }

    public function editstud($st_id,$st_name,$st_rollno,$st_class,$st_sex,$update_image_path){
        $editst = $this->db->query("UPDATE student_db SET student_name = '$st_name', student_rollno= '$st_rollno' , student_class= '$st_class', student_sex = '$st_sex', student_photo= '$update_image_path' WHERE student_id = '$st_id'");
        return $editst;
    }

    public function find_stud($stud_id){
        $editst = $this->db->query("select * from student_db where student_id='$stud_id'");
        return $editst->row();
    }

    public function std_gender_record(){
        $std_rec = $this->db->query("select student_sex,count(student_sex) as gender from student_db group by student_sex");
        return $std_rec->result();
    }

    public function add_student($add_full_name,$add_rollst,$add_classst,$pass_hash,$add_genst,$image_path){
        $add_st = $this->db->query("Insert into student_db (student_name,student_rollno,student_class,student_password,student_sex,student_photo) values ('$add_full_name','$add_rollst','$add_classst','$pass_hash','$add_genst','$image_path')");
        return $add_st;
    }

    public function blacklist_add($id){
        $black_add = $this->db->query("insert into blacklist_tb(blacklist_id, blacklist_name, blacklist_class,blacklist_rollno,blacklist_photo)select student_id,student_name,student_class,student_rollno,student_photo from student_db where student_id='$id'");
        return $black_add;
    }

    public function blacklist_all(){
        $black_all = $this->db->query("select * from blacklist_tb");
        return $black_all->result();
    }


}

?>