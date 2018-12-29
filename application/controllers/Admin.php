<?php

class Admin extends MY_Controller{

    public function login(){
        $this->load->view('admin/login');
    }

    public function welcome(){
        //std_gender_record
        $this->load->model('adminlogin');
        $stchartrecord = $this->adminlogin->std_gender_record();
        $this->load->view('admin/dashboard',['stchartrecord'=>$stchartrecord]);
    
    }

    public function student_detail(){
        $this->load->model('adminlogin');
        $studentinfo =  $this->adminlogin->studentlist();

        $this->load->view('admin/student_detail',['studentinfo'=>$studentinfo]);
    }
    
    public function logout(){
        $this->session->unset_userdata('id');
        return redirect('Login');
    }
    // this method is for delete student if you use form in php
    // public function delstud(){
    //     $id = $this->input->post('id');
    //     $this->load->model('adminlogin');
    //     if($this->adminlogin->delstud($id)){
    //         $this->session->set_flashdata('delmsg','Student deleted successfully');

    //     }else{
    //         $this->session->set_flashdata('delmsg','Student not deleted try again');
    //     }
    //     return redirect('Admin/student_detail');
    // }

    public function remove_stud(){   
       $id = $this->uri->segment(3);
       $this->load->model('adminlogin');
        if($this->adminlogin->delstud($id)){ 
            $this->session->set_flashdata('delmsg','Student deleted successfully');

        }else{
             $this->session->set_flashdata('delmsg','Student not deleted try again');
         }
      return redirect('Admin/student_detail');

    }

    public function edit_stud($stud_id){
        $id = $this->uri->segment(3);
        $this->load->model('adminlogin');
        $stud_data = $this->adminlogin->find_stud($id);
        $this->load->view('admin/edit_st',['stud_data'=>$stud_data]);
    }

    public function student_save(){
        $config['upload_path']          = './assets/img/student_photo';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->upload->initialize($config);

        $this->form_validation->set_rules('st_name','Student Name','required');
        $this->form_validation->set_rules('st_rollno','Student Roll no','required');
        $this->form_validation->set_rules('st_class','Student Class','required');
        $this->form_validation->set_rules('st_sex','Student Sex','required');

        if($this->form_validation->run() && $this->upload->do_upload('st_photo')){
            //true
            $st_id = $this->input->post('st_id');
            $st_name = $this->input->post('st_name');
            $st_rollno = $this->input->post('st_rollno');
            $st_class = $this->input->post('st_class');
            $st_sex = $this->input->post('st_sex');

            $data_v = $this->upload->data();  //will take upload file value
            
            $update_image_path = base_url("assets/img/student_photo/".$data_v['raw_name'].$data_v['file_ext']);
            
            $this->load->model('adminlogin');
            if($this->adminlogin->editstud($st_id,$st_name,$st_rollno,$st_class,$st_sex,$update_image_path)){
                //true
                $this->session->set_flashdata('editmsg','Student Records Edited successfully');
            }
            else{
                //false
                $this->session->set_flashdata('editmsg','Student Records NOt Edited Try Again!');
            }

        }
        else{
            $this->load->view('admin/student_detail');
        }
        return redirect('Admin/student_detail');
    }

    public function __construct()
    {
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');
    
    }


    public function add_student(){
        $this->load->view('admin/add_st');
        
    }

    public function register_student(){
        $config['upload_path']          = './assets/img/student_photo';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->upload->initialize($config);

        $this->form_validation->set_rules('add_firstst','Student Name','required');
        $this->form_validation->set_rules('add_middlest','Student Roll no','required');
        $this->form_validation->set_rules('add_lastst','Student Class','required');
        $this->form_validation->set_rules('add_rollst','Student Rollno','required');
        $this->form_validation->set_rules('add_classst','Student Class','required');
        $this->form_validation->set_rules('add_passst','Student Password','required');

        if($this->form_validation->run() && $this->upload->do_upload('add_photost')){
            //true
            $add_firstst = $this->input->post('add_firstst');   //will take all form value
            $add_middlest = $this->input->post('add_middlest'); 
            $add_lastst = $this->input->post('add_lastst'); 
            $add_rollst = $this->input->post('add_rollst'); 
            $add_classst = $this->input->post('add_classst'); 
            $add_passst = $this->input->post('add_passst'); 
            $add_genst = $this->input->post('add_genst');
            
            $add_full_name = $add_firstst.' '.$add_middlest.' '.$add_lastst;
            
            $data = $this->upload->data();  //will take upload file value
            
            $pass_hash = password_hash($add_passst,PASSWORD_DEFAULT);

            $image_path = base_url("assets/img/student_photo/".$data['raw_name'].$data['file_ext']);

            $this->load->model('adminlogin');
            if($this->adminlogin->add_student($add_full_name,$add_rollst,$add_classst,$pass_hash,$add_genst,$image_path)){
                //true
                $this->session->set_flashdata('addst','New Student Add in Database successfully');
                return redirect('Admin/add_student');
            }else{
                //false
                $this->session->set_flashdata('addst','New Student NotAdd in Database Try Again');
                return redirect('Admin/add_student');
            }

        }else{
            //false
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/add_st',$error);
        }


    }//register__student close


    public function blacklist_add(){
        $id = $this->uri->segment(3);
        
        $this->load->model('adminlogin');   
        if($this->adminlogin->blacklist_add($id)){ 
            $this->session->set_flashdata('def_st','Student Added to Defaulter list successfully');
        }else{
             $this->session->set_flashdata('def_st','Student Added to Defaulter list try again');
         }
      return redirect('Admin/student_detail');
        
    }

    public function blacklist_student(){
        $this->load->model("adminlogin");
        $black_l = $this->adminlogin->blacklist_all();
        $this->load->view('admin/defaulter',['black_l'=>$black_l]);               
    }




}

?>