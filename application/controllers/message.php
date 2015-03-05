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
        	print json_encode($query);
    	}
		else
    	{
    	    header('HTTP/1.1 500 Internal Server Error');
        	header('Content-Type: application/json; charset=UTF-8');
        	die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
	    }
	}

	public function update($lastmsgid)
	{
		//get last message from db
		//and echo it for ajax call.

		if($lastmsgid==0) //user just joined. send last message.
		{
			$sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 1;";
		}
		else //send all messages since last.
		{
			$sql = "SELECT * FROM messages WHERE id>'$lastmsgid';";
		}

		$query = $this->db->query($sql);

		if ($query)
    	{
        	header('Content-Type: application/json');
        	echo json_encode($query->result());
    	}
		else
    	{
    	    header('HTTP/1.1 500 Internal Server Error');
        	header('Content-Type: application/json; charset=UTF-8');
        	die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
	    }
	}

}