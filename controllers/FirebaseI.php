<?php
class FirebaseI extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('firebase');
		$firebase = $this->firebase->init();
		$database = $firebase->createDatabase();
		$reference = $database->getReference('/question');
		$snapshot = $reference->getSnapshot();
		$value = $snapshot->getValue();
		echo "<pre>";
		echo print_r($value);
	}
	

	
}