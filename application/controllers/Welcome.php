<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
	     $this->load->model('Website_model');
		 $this->load->library("pagination");
	}

	public function index()
	{   
         //pagination settings
        $config['base_url'] = site_url('welcome/index');
        $config['total_rows'] = $this->db->count_all('tbladdnews');
        $config['per_page'] = "3";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['next_link'] = '&raquo';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="next"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="prev"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link"><a href="#" style="color: #fff; text-decoration: none;">';
        $config['cur_tag_close'] = '</span></li></a>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        //$data['student'] = $this->StudentPagination_Model->get_students($config["per_page"], $page);

		$data['category']=$this->Website_model->categoryList();
		$data['resentlypost']=$this->Website_model->resentlypost();
		$data['viewdetails']=$this->Website_model->getnewsubdetails($config["per_page"], $page);
		$this->load->view('welcome_message',$data);
	}

	public function post($id)
	{
		$usernewdetails['category']=$this->Website_model->categoryList();
		$usernewdetails['viewdetail']=$this->Website_model->resentlypost();
		$usernewdetails['viewdetails']=$this->Website_model->getwebsitedetails($id);
		$usernewdetails['comment']=$this->Website_model->getcomment($id);
	
		$this->load->view('post',$usernewdetails);
	}

	public function comment()
	{
		if($this->input->post('type')==1)
		{
			$postid=$this->input->post('postid');
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$comment=$this->input->post('comment');
			$status=0;
			$this->load->model('Website_model');
			$this->Website_model->commentsave($postid,$name,$email,$comment,$status);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}
}
