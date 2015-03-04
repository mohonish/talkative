<?php

class Chat extends CI_Controller {

	public function index()
	{
		$data['uname'] = $this->input->post('uname', TRUE);
		if($data['uname'])
		{
			$this->load->view('templates/header', $data);
			$this->load->view('chat', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			//no name given.
			//redirect to home page with error message.
		}

	}
}