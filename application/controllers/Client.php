<?php

class Client extends MY_Controller{
  
    public function blacklist(){
        $this->load->view('client/blacklist');
        
    }
    
    public function show_blacklist(){

        $this->load->model('clientmodel');
        $result = $this->clientmodel->display_blacklist();
        echo json_encode($result);
    }

}

?>