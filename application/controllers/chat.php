<?php

class Chat extends CI_Controller {

	public function index()
	{
		$data['uname'] = $this->input->post('uname', TRUE);
		
		if($data['uname'])
		{
			
			$msg = $data['uname'] . " just joined the conversation.";
			$sql = "INSERT INTO messages (uname, msg) VALUES ('DAEMON', '$msg');";
			$this->db->query($sql);
			
			$this->load->view('templates/header', $data);
			$this->load->view('chat', $data);
			$this->load->view('templates/footer', $data);
		}
		
		else
		{
			//no name given.
			//redirect to home page with error message.
			header("Location:index.php");
		}

	}
}