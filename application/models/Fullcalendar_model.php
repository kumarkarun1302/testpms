<?php

class Fullcalendar_model extends CI_Model
{
	function fetch_all_event(){
		$this->db->order_by('id');
		return $this->db->get('events');
	}

	function insert_event($data)
	{
		$this->db->insert('events', $data);
	}

	function update_event($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	function delete_event($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('events');
	}

	public function get_events($start, $end)
	{
	    return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");
	}

	public function add_event($data)
	{
	    $this->db->insert("calendar_events", $data);
	}

	public function get_event($id)
	{
	    return $this->db->where("ID", $id)->get("calendar_events");
	}

	public function update_event1($id, $data)
	{
	    $this->db->where("ID", $id)->update("calendar_events", $data);
	}

	public function delete_event1($id)
	{
	    $this->db->where("ID", $id)->delete("calendar_events");
	}

}

?>