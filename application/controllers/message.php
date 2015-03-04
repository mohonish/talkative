<?php

class Message extends CI_Controller {

	public function index()
	{
		$uname = $this->input->post('uname', TRUE);
		$message = $this->input->post('message', TRUE);
		$sql = "INSERT INTO messages (uname, msg) VALUES ('$uname', '$message');";
		$query = $this->db->query($sql);

		if ($query)
    	{
        	header('Content-Type: application/json');
        	print json_encode($result);
    	}
		else
    	{
    	    header('HTTP/1.1 500 Internal Server Booboo');
        	header('Content-Type: application/json; charset=UTF-8');
        	die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
	    }
	}
}