<?php defined('BASEPATH') OR exit('No direct script access allowed');

class insertdb extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
	}
	

	public function import()
	{
		$this->load->library('excel');
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$lead_generation_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$order_number_leads = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$joined_us_on = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$follow_up_date = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$contact_person_name = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$contact_person_email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$contact_person_skype_id = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$company_email = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$phone_number = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$mobile_number = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$joined_us_on = date('Y-m-d', strtotime($joined_us_on));
					$follow_up_date = date('Y-m-d', strtotime($follow_up_date));
					$company_website = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$company_name = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$zip_code = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$fax = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$state_name = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
					$city = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
					$country = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
					$facebook_url = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
					$twitter_url = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
					$skype_url = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
					$client_type = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
					$lead_status = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
					$lead_source = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
					$data = array(
						'lead_generation_name'=>$lead_generation_name,
						'order_number_leads'=>$order_number_leads,
						'joined_us_on'=>$joined_us_on,'follow_up_date'=>$follow_up_date,
						'contact_person_name'=>$contact_person_name,
						'contact_person_email'=>$contact_person_email,
						'contact_person_skype_id'=>$contact_person_skype_id,
						'company_email'=>$company_email,
						'phone_number'=>$phone_number,'mobile_number'=>$mobile_number,
						'company_website'=>$company_website,
						'company_name'=>$company_name,'address'=>$address,
						'zip_code'=>$zip_code,'fax'=>$fax,'state_name'=>$state_name,'city'=>$city,'country'=>$country,
						'facebook_url'=>$facebook_url,'twitter_url'=>$twitter_url,'skype_url'=>$skype_url,
						'client_type'=>$client_type,'lead_status'=>$lead_status,'lead_source'=>$lead_source,
						'created_date'=>date_from_today()
					);
					insert_data_last_id('tbl_leads',$data);
				}
			}
			//echo $this->db->last_query();exit();
			redirect('leads');
		}	
	}

	public function optioanl_remove_field(){
		$product_id = $this->input->post('product_id');
		$this->db->query("DELETE FROM `tbl_products` WHERE product_id=$product_id");
		echo $product_id;
	}


	public function remove_field_product(){
		$product_id = $this->input->post('product_id');
		$this->db->query("DELETE FROM `tbl_products` WHERE product_id=$product_id");
		echo 1;
	}

	public function ajax_city(){
		$state_id = $this->input->post('state_id');
		$getCity = getCity($state_id);
		$html = '';
		foreach ($getCity as $key => $val) {
			$html .= '<option value="'.$val['city_id'].'">'.$val['city'].'</option>';
		}
		echo $html;
	}

	public function ajax_state(){
		$country_id = $this->input->post('country_id');
		$this->db->select('*');
		$this->db->from('tbl_states');
		$this->db->where('country_id',$country_id);
		$this->db->order_by('name','ASC');
		$query_country=$this->db->get();
		$result_country = $query_country->result_array();
		$html = '';
		foreach ($result_country as $key => $val) {
			$html .= '<option value="'.$val['id'].'">'.$val['name'].'</option>';
		}
		echo $html;
	}

	public function insert_sales()
	{
		unset($_POST['submit']);
		$sales_id = $this->input->post('sales_id');
		$p1 = count($_POST['product_name']);
		$p2 = count($_POST['product_nameo']);
		$p3 = count($_POST['section_sales']);
		$p4 = count($_POST['noted_sales']);
		if($sales_id){
			$sales_combo_id = $this->input->post('sales_combo_id');
			if($p1 > 0){
				$this->db->query("DELETE FROM `tbl_products` WHERE sales_combo_id=$sales_combo_id and product_type=0 and section_sales='' and noted_sales=''");
				for($i=0;$i<=$p1;$i++){
					$sales_datetbl_products = array(
								'sales_combo_id'=>$sales_combo_id,
								'product_name'=>$this->input->post('product_name')[$i],
								'product_description'=>$this->input->post('product_description')[$i],
								'product_qty'=>$this->input->post('product_qty')[$i],
								'unit_price'=>$this->input->post('unit_price')[$i],
								'product_taxs'=>$this->input->post('product_taxs')[$i],
								'subtotal'=>$this->input->post('subtotal')[$i],
								'updated_date'=>date_from_today(),
								'product_type'=>0
							);
					insert_data_last_id('tbl_products',$sales_datetbl_products);
				}
			}

			if($p2 > 0){
				$this->db->query("DELETE FROM `tbl_products` WHERE sales_combo_id=$sales_combo_id and product_type=1 and section_sales='' and noted_sales=''");
				for($i=0;$i<=$p2;$i++){
					$sales_datetbl_productso = array(
							'sales_combo_id'=>$sales_combo_id,
							'product_name'=>$this->input->post('product_nameo')[$i],
							'product_description'=>$this->input->post('product_descriptiono')[$i],
							'product_qty'=>$this->input->post('product_qtyo')[$i],
							'unit_price'=>$this->input->post('unit_priceo')[$i],
							'product_taxs'=>$this->input->post('product_taxso')[$i],
							'subtotal'=>$this->input->post('subtotalo')[$i],
							'updated_date'=>date_from_today(),
							'product_type'=>1
						);
				insert_data_last_id('tbl_products',$sales_datetbl_productso);
				}
			}
			if($p3 > 0){
				$this->db->query("DELETE FROM `tbl_products` WHERE sales_combo_id=$sales_combo_id and product_type=1 and section_sales!=''");
				for($i=0;$i<=$p1;$i++){
				$sales_datetbl_productssection_sales = array(
							'sales_combo_id'=>$sales_combo_id,
							'section_sales'=>$this->input->post('section_sales')[$i],
							'updated_date'=>date_from_today(),
							'product_type'=>0
						);
				insert_data_last_id('tbl_products',$sales_datetbl_productssection_sales);
				}
			}
			if($p4 > 0){
				$this->db->query("DELETE FROM `tbl_products` WHERE sales_combo_id=$sales_combo_id and product_type=1 and noted_sales!=''");
				for($i=0;$i<=$p1;$i++){
					$sales_datetbl_productsnoted_sales = array(
								'sales_combo_id'=>$sales_combo_id,
								'noted_sales'=>$this->input->post('noted_sales')[$i],
								'updated_date'=>date_from_today(),
								'product_type'=>0
							);
					insert_data_last_id('tbl_products',$sales_datetbl_productsnoted_sales);
				}
			}
			$sales_data_updated = array(
				'sales_combo_id'=>$sales_combo_id,
				'sales_customer'=>$this->input->post('sales_customer'),'gst_treatment'=>$this->input->post('gst_treatment'),
				'payment_terms'=>$this->input->post('payment_terms'),
				'expiration_date'=>$this->input->post('expiration_date'),
				'sales_person'=>$this->input->post('sales_person'),
				'sales_team'=>$this->input->post('sales_team'),'company'=>$this->input->post('company'),
				'online_signature'=>$this->input->post('online_signature'),
				'online_payment'=>$this->input->post('online_payment'),
				'customer_reference'=>$this->input->post('customer_reference'),
				'fiscal_position'=>$this->input->post('fiscal_position'),
				'journal'=>$this->input->post('journal'),'shipping_policy'=>$this->input->post('shipping_policy'),
				'delivery_date'=>$this->input->post('delivery_date'),
				'updated_date'=>date_from_today()
				);
			edit_update_multi_where('tbl_sales',$sales_data_updated,array('sales_id'=>$sales_id));

		} else {

			$sales_combo_id = time();
			$sales_data = array(
				'sales_combo_id'=>$sales_combo_id,
				'sales_customer'=>$this->input->post('sales_customer'),
				'gst_treatment'=>$this->input->post('gst_treatment'),
				'payment_terms'=>$this->input->post('payment_terms'),'expiration_date'=>$this->input->post('expiration_date'),
				'sales_person'=>$this->input->post('sales_person'),
				'sales_team'=>$this->input->post('sales_team'),'company'=>$this->input->post('company'),
				'online_signature'=>$this->input->post('online_signature'),
				'online_payment'=>$this->input->post('online_payment'),
				'customer_reference'=>$this->input->post('customer_reference'),
				'fiscal_position'=>$this->input->post('fiscal_position'),'journal'=>$this->input->post('journal'),
				'shipping_policy'=>$this->input->post('shipping_policy'),'delivery_date'=>$this->input->post('delivery_date'),
				'created_date'=>date_from_today()
				);
			insert_data_last_id('tbl_sales',$sales_data);

			if($p1 > 0){
				for($i=0;$i<=$p1;$i++){
				$sales_datetbl_products = array(
							'sales_combo_id'=>$sales_combo_id,
							'product_name'=>$this->input->post('product_name')[$i],
							'product_description'=>$this->input->post('product_description')[$i],
							'product_qty'=>$this->input->post('product_qty')[$i],
							'unit_price'=>$this->input->post('unit_price')[$i],
							'product_taxs'=>$this->input->post('product_taxs')[$i],
							'subtotal'=>$this->input->post('subtotal')[$i],
							'section_sales'=>$this->input->post('section_sales')[$i],
							'noted_sales'=>$this->input->post('noted_sales')[$i],
							'created_date'=>date_from_today(),
							'product_type'=>0
						);
				insert_data_last_id('tbl_products',$sales_datetbl_products);
				}
			}
			if($p2 > 0){
				for($i=0;$i<=$p2;$i++){
					$sales_datetbl_productso = array(
							'sales_combo_id'=>$sales_combo_id,
							'product_name'=>$this->input->post('product_nameo')[$i],
							'product_description'=>$this->input->post('product_descriptiono')[$i],
							'product_qty'=>$this->input->post('product_qtyo')[$i],
							'unit_price'=>$this->input->post('unit_priceo')[$i],
							'product_taxs'=>$this->input->post('product_taxso')[$i],
							'subtotal'=>$this->input->post('subtotalo')[$i],
							'created_date'=>date_from_today(),
							'product_type'=>1
						);
				insert_data_last_id('tbl_products',$sales_datetbl_productso);
				}
			}

			if($p3 > 0){
				for($i=0;$i<=$p1;$i++){
				$sales_datetbl_productssection_sales = array(
							'sales_combo_id'=>$sales_combo_id,
							'section_sales'=>$this->input->post('section_sales')[$i],
							'created_date'=>date_from_today(),
							'product_type'=>0
						);
				insert_data_last_id('tbl_products',$sales_datetbl_productssection_sales);
				}
			}

			if($p4 > 0){
				for($i=0;$i<=$p1;$i++){
					$sales_datetbl_productsnoted_sales = array(
								'sales_combo_id'=>$sales_combo_id,
								'noted_sales'=>$this->input->post('noted_sales')[$i],
								'created_date'=>date_from_today(),
								'product_type'=>0
							);
					insert_data_last_id('tbl_products',$sales_datetbl_productsnoted_sales);
				}
			}

		}
		
		//echo $this->db->last_query();exit;
		
		redirect('sales_view');
	}

	public function insert_leads()
	{
		unset($_POST['submit']);
		unset($_POST['Submit']);
		$_POST['joined_us_on'] = date('Y-m-d h-i-s', strtotime($_POST['joined_us_on']));
		$_POST['follow_up_date'] = date('Y-m-d h-i-s', strtotime($_POST['follow_up_date']));
		$lead_id = $this->input->post('lead_id');
		if($lead_id){
			edit_update_multi_where('tbl_leads', $_POST,array('lead_id'=>$lead_id));
		} else {
			insert_data_last_id('tbl_leads',$_POST);
		}
		//echo $this->db->last_query();exit;
		redirect('leads');
	}

	public function insert_comment()
	{
		$order_number_leads = $this->input->post('lead_id');
		insert_data_last_id('tbl_comment',array('comment'=>$this->input->post('comment'),'created_date'=>date_from_today(),'lead_id'=>$order_number_leads));
		echo $this->getListComment($order_number_leads);
	}
	
	public function getListComment1(){
		echo $this->getListComment($this->input->post('lead_id'));
	}

	public function getListComment($order_number_leads){
		$query_tbl_comment = $this->db->query("SELECT * FROM `tbl_comment` where lead_id='$order_number_leads' ORDER BY `tbl_comment`.`comment_id` DESC");
		$result_tbl_comment = $query_tbl_comment->result_array();
		$html = '';
		foreach ($result_tbl_comment as $key => $value) {
			$html .= '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">'.$value['comment'].'</div><br>';
		}
		return $html;
	}

	public function bloglists(){
		$view_data['title'] = 'Blog Lists';
		$this->load->view('header',$view_data);
		$this->load->view('bloglists');
		$this->load->view('footer');
	}

	public function packageview(){
		$view_data['title'] = 'Package Lists';
		$this->load->view('header',$view_data);
		$this->load->view('packageview');
		$this->load->view('footer');
	}


	public function feedbacklist(){
		$view_data['title'] = 'feedback Lists';
		$this->load->view('header',$view_data);
		$this->load->view('feedbacklist');
		$this->load->view('footer');
	}

	
}

?>	