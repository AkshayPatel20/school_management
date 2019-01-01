<?php

class clientmodel extends CI_Model{

    public function display_blacklist(){
        $fetch_student_blacklist = $this->db->query("select * from blacklist_tb");

        return $fetch_student_blacklist->result();
        
    }


}

?>