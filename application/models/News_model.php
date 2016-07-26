<?php
    class News_model extends CI_Model{
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        public function get_news($slug = FALSE){
            
            $this->load->helper('text');
            $this->db->order_by('id','desc');
            if($slug === FALSE){
                $query = $this->db->get('news');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('news', array("slug"=>$slug));
            return $query->row_array();
        }
        public function set_news($file_name){
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => url_title($this->input->post('slug'),'-',TRUE),
                'text'=> $this->input->post('description'),
                    'image' => $file_name
            );
            
            return $this->db->insert('news',$data);
        }
    }
?>