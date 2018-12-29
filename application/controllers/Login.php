<?php
class Login extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
        if( $this->session->userdata('id') )
        return redirect('admin/welcome');
        
    }

    public function index(){
        //validation first load Library
        $this->form_validation->set_rules('ad_Username','Username','required');
        $this->form_validation->set_rules('ad_Password','Password','required');

        if($this->form_validation->run()){
            //true
            $ad_username = $this->input->post('ad_Username');
            $ad_password = $this->input->post('ad_Password');

            $this->load->model('adminlogin');
            $login_id = $this->adminlogin->isvalidate($ad_username,$ad_password);
            if($login_id){   //correct
                $this->load->library('session');
                $this->session->set_userdata('id',$login_id);
                return redirect('Admin/welcome');
            }     
            else{   //failed
                $this->session->set_flashdata('login_failed','Invalid Username Or Password');
                return redirect('Admin/login');
            }
            
        }else{
            //false
            $this->load->view('admin/login');
        }

    }//index close


}
?>