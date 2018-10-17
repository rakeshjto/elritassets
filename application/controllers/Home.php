<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$data['title'] = "ELR IT Assets Summary";
   		$this->load->model('itassets_model','iam',TRUE);
		$data['summary'] = $this->iam->get_summary();
		$data['content'] = "summary";
		$data['scripts'] = array('elritassets');
		$this->load->view('layout',$data);
	}
	
	public function overview($asset,$report_item)
	{
		$data['title'] = $asset. " - " .$report_item. " wise Overview of ELURU SSA";
   		$this->load->model('itassets_model','iam',TRUE);
		$data['get_overview'] = $this->iam->get_overview($asset,$report_item);
		$data['report_item']=$report_item;
		$data['content'] = "overview";
		$data['scripts'] = array('elritassets');
		$this->load->view('layout',$data);
	}
	
	public function ie(){
		$data = array(
			'title' => $this->agent->browser() .' ' . $this->agent->version(),
			'content' => 'browser_support'
			);
		$this->load->view('layout-empty',$data);		
	}
	
	
	
}
