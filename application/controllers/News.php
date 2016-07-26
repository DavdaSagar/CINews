<?php

class News extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }
    
    public function index(){
        $data['news'] = $this->news_model->get_news();
        $data['title'] = "Latest News";
        
        $this->load->view("templates/header",$data);
        $this->load->view("news/index",$data);
        $this->load->view("templates/footer");
    }
    
    public function view($slug = NULL){
        $data['news_item'] = $this->news_model->get_news($slug);
        
        if(empty($data['news_item'])){
            show_404();
        }
        
        $data['title'] = $data['news_item']['title'];
        
        $this->load->view('templates/header',$data);
        $this->load->view('news/view',$data);
        $this->load->view('templates/footer');
    }
    
    public function ajax_view($slug = NULL){
        if(empty($slug)){
            $slug = $this->input->post('slug');
        }
        $data['news_item'] = $this->news_model->get_news($slug);
        
        if(empty($data['news_item'])){
            show_404();
        }
        
        $data['title'] = $data['news_item']['title'];
        
        $this->load->view('news/ajax/view',$data);        
    }


    public function add(){
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('description', 'Text', 'required');
        
        $data['title'] = "Add News";
        
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('news/add');
            $this->load->view('templates/footer');
        }
        else{
            
            $file_name = '';
            if(!empty($_FILES['image']['name'])){
                
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name'] = date("Ymdhis");
                
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload('image')){
                    
                    $data['title'] = "News image upload failed";
                    $data['result'] = "Failed";
                    $data['error_message'] = $this->upload->display_errors();
                    
                }else{                                        
                    $file_name = $this->upload->data('file_name');
                }      
            }
            
            
            $result = $this->news_model->set_news($file_name);
            if($result){
                $data['title'] = "News has been added";
                $data['result'] = 'Success';
            }
            $this->load->view('templates/header',$data);
            $this->load->view('news/add',$data);
            $this->load->view('templates/footer');
        }
    }
    
}

