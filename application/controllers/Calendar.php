<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('fullcalendar_model');
	}

	public function demo()
     {
          $this->load->view("calendar");
     }

	function index()
	{
		$this->load->view('fullcalendar');
	}

	function contacts()
	{
		insert_data_last_id('tbl_contacts',array('created_date'=>date_from_today(),'ip_address'=>$this->input->ip_address()));
		$this->load->view('contacts');
	}

	function load()
	{
		$event_data = $this->fullcalendar_model->fetch_all_event();
		foreach($event_data->result_array() as $row)
		{
			$data[] = array(
				'id'	=>	$row['id'],
				'title'	=>	$row['title'],
				'start'	=>	$row['start_event'],
				'end'	=>	$row['end_event']
			);
		}
		echo json_encode($data);
	}

	function insert()
	{
		if($this->input->post('title'))
		{
			$data = array(
				'title'		=>	$this->input->post('title'),
				'start_event'=>	$this->input->post('start'),
				'end_event'	=>	$this->input->post('end')
			);
			$this->fullcalendar_model->insert_event($data);
		}
	}

	function update()
	{
		if($this->input->post('id'))
		{
			$data = array(
				'title'			=>	$this->input->post('title'),
				'start_event'	=>	$this->input->post('start'),
				'end_event'		=>	$this->input->post('end')
			);

			$this->fullcalendar_model->update_event($data, $this->input->post('id'));
		}
	}

	function delete()
	{
		if($this->input->post('id'))
		{
			$this->fullcalendar_model->delete_event($this->input->post('id'));
		}
	}

	 public function get_events()
	 {
	     $start = $this->input->get("start");
	     $end = $this->input->get("end");
	     $startdt = new DateTime('now'); // setup a local datetime
	     $startdt->setTimestamp($start); // Set the date based on timestamp
	     $start_format = $startdt->format('Y-m-d H:i:s');
	     $enddt = new DateTime('now'); // setup a local datetime
	     $enddt->setTimestamp($end); // Set the date based on timestamp
	     $end_format = $enddt->format('Y-m-d H:i:s');
	     $events = $this->fullcalendar_model->get_events($start_format, $end_format);
	     $data_events = array();
	     foreach($events->result() as $r) {
	         $data_events[] = array(
	             "id" => $r->ID,
	             "title" => $r->title,
	             "description" => $r->description,
	             "end" => $r->end,
	             "start" => $r->start
	         );
	     }
	     echo json_encode(array("events" => $data_events));
	     exit();
	 }

	 public function add_event() 
	{
	    $name = $this->input->post("name", TRUE);
	    $desc = $this->input->post("description", TRUE);
	    $start_date = $this->input->post("start_date", TRUE);
	    $end_date = $this->input->post("end_date", TRUE);
	    
	    $this->fullcalendar_model->add_event(array(
	       "title" => $name,
	       "description" => $desc,
	       "start" => $start_date,
	       "end" => $end_date
	       )
	    );
	    redirect(site_url("calendar/demo"));
	}

	public function edit_event()
     {
          $eventid = intval($this->input->post("eventid"));
          $event = $this->fullcalendar_model->get_event($eventid);
          if($event->num_rows() == 0) {
               echo"Invalid Event";
               exit();
          }
          $event->row();
          $name = $this->common->nohtml($this->input->post("name"));
          $desc = $this->common->nohtml($this->input->post("description"));
          $start_date = $this->common->nohtml($this->input->post("start_date"));
          $end_date = $this->common->nohtml($this->input->post("end_date"));
          $delete = intval($this->input->post("delete"));
          if(!$delete) {
               if(!empty($start_date)) {
                    $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                    $start_date = $sd->format('Y-m-d H:i:s');
                    $start_date_timestamp = $sd->getTimestamp();
               } else {
                    $start_date = date("Y-m-d H:i:s", time());
                    $start_date_timestamp = time();
               }
               if(!empty($end_date)) {
                    $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                    $end_date = $ed->format('Y-m-d H:i:s');
                    $end_date_timestamp = $ed->getTimestamp();
               } else {
                    $end_date = date("Y-m-d H:i:s", time());
                    $end_date_timestamp = time();
               }
               $this->fullcalendar_model->update_event($eventid, array(
                    "title" => $name,
                    "description" => $desc,
                    "start" => $start_date,
                    "end" => $end_date,
                    )
               );
          } else {
               $this->fullcalendar_model->delete_event($eventid);
          }
          redirect(site_url("calendar/demo"));
     }


}

?>