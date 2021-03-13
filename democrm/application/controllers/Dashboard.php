<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	    
	public function __construct(){
		parent::__construct();
	}
		
	public function index(){
		$admin_details = $this->session->userdata('admin_details');
		$view_data['data']='';
		$this->load->view('header', $view_data);
		$this->load->view('dashboard', $view_data);
		$this->load->view('footer',$view_data);
	}
		
	public function leads(){
		$view_data['title'] = 'Leads Lists';
		$this->load->view('header',$view_data);
		$this->load->view('leads_view');
		$this->load->view('footer');
	}

	public function leads_add_frm(){
		$view_data['title'] = 'Leads Add';
		$lead_id = $this->uri->segment(2);
		$query = $this->db->query("SELECT * FROM `tbl_leads` WHERE `lead_id`='$lead_id'");
		$view_data['result'] = $query->row_array();
		 
		$number = substr(autonumber(), 6);
		$a1 = str_pad(intval($number) + 1, strlen($number), '0', STR_PAD_LEFT);

		if($lead_id){
			$view_data['order_number_leads'] = $view_data['result']['order_number_leads'];
		} else {
			$view_data['order_number_leads'] = customName().''.$a1;
		}

		$this->load->view('header',$view_data);
		$this->load->view('leads',$view_data);
		$this->load->view('footer',$view_data);
		$this->load->view('leads_ajax_footer',$view_data);
	}

	public function leads2(){
		$view_data['title'] = 'Leads Add';
		$this->load->view('header',$view_data);
		$this->load->view('leads2');
		$this->load->view('footer');
	}
	
	public function contacts(){
		$view_data['title'] = 'User Type';
		$this->load->view('header',$view_data);
		$this->load->view('contacts');
		$this->load->view('footer');
	}

	public function sales_view()
	{
		$view_data['title'] = 'Sales View';
		$this->load->view('header', $view_data);
		$this->load->view('sales_view');
		$this->load->view('footer');
	}

	public function sales_add()
	{
		$view_data['title'] = 'Sales Add';
		$sales_id = $this->uri->segment(2);
		$query = $this->db->query("SELECT * FROM `tbl_sales` WHERE `sales_id`='$sales_id'");
		$view_data['result'] = $query->row_array();
		$this->load->view('header', $view_data);
		$this->load->view('sales_add',$view_data);
		$this->load->view('footer');
		$this->load->view('sales_ajax_footer',$view_data);
	}

	public function invoice(){
		$this->load->helper('pdf_helper'); 
		$url = 'https://anjpms.com/assets/images/us.jpg';
			$html = '
<html>
	<body>
		<header>
			<h1 style="test-align:center;">Invoice</h1>
			
			
<table style="width:100%;border-collapse: collapse;margin-bottom:1em;" border="0" cellspacing="0" cellpadding="0" valign="top">
    <tr valign="top">
      <td valign="top">
		<address style="float: left;font-size: 75%;font-style: normal;line-height: 1.25;margin: 0 1em 1em 0;">
				<p>Jonathan Neal
				<br>
				101 E. Chapman Ave<br>Orange, CA 92866
				<br>
				(800) 555-1234</p>
		</address>
      </td>
      <td>
      	<table class="meta" border="1" cellspacing="0" cellpadding="2" style="float: left;margin-left:400px;width:100%;">
			<tr>
				<td><img src="'.$url.'"></td>
			</tr>
		</table>
      </td>
    </tr>    
</table>

</header>

<table style="width:100%;border-collapse: collapse;margin-bottom:1em;" border="0" cellspacing="0" cellpadding="0">

    <tr valign="top">      
      <td valign="top" style="width:50%;">
		<h3 class="alert alert-warning alert-bg-p" style="
background-color: #f39c12 !important;
box-shadow: 0 20px 10px rgba(0, 0, 0, 0.2);
color: #fff !important;
border: 1px solid transparent;
padding: 130px;
padding-right: 13px;
padding-right: 100px;
float: left;
margin-left: 5px;
border-radius: 5px;margin-bottom: 20px;">PARTIALLY PAID</h3>
      </td>

      <td style="width:50%;">
      	<table class="meta" border="1" cellspacing="0" cellpadding="2" style="float: left;width:100%;margin-left:150px;">
			<tr>
				<th style="text-align:left;float:left;"><span>Invoice #</span></th>
				<td><span>101138</span></td>
			</tr>
			<tr>
				<th style="text-align:left;float:left;"><span>Date</span></th>
				<td><span>January 1, 2012</span></td>
			</tr>
		</table>
      </td>

    </tr>    
</table>

<table style="width:100%;border-collapse: collapse;margin-bottom:1em;" border="0" cellspacing="0" cellpadding="0" valign="top">
    <tr valign="top">
      <td valign="top">
		<address style="float: left;font-size: 100%;font-style: normal;line-height: 1.25;margin: 0 1em 1em 0;">
			<p>Some Company<br>c/o Some Guy</p>
		</address>
      </td>
      <td>
      	<table class="meta" border="1" cellspacing="0" cellpadding="2" style="float: left;margin-left:400px;width:100%;">
			<tr>
				<th style="text-align:left;float:left;"><span>Invoice #</span></th>
				<td><span>101138</span></td>
			</tr>
			<tr>
				<th style="text-align:left;float:left;"><span>Date</span></th>
				<td><span>January 1, 2012</span></td>
			</tr>
		</table>
      </td>
    </tr>    
</table>

<br>
	<table border="1" cellspacing="0" cellpadding="4" style="width:100%;border-collapse: separate;">
				<thead>
					<tr>
						<th><span contenteditable>Item</span></th>
						<th><span contenteditable>Description</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
						<td><span contenteditable>Experience Review</span></td>
						<td style="text-align:right;float:right;">$<span>150.00</span></td>
						<td style="text-align:right;float:right;"><span>4</span></td>
						<td style="text-align:right;float:right;">$<span>600.00</span></td>
					</tr>
					<tr>
						<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
						<td><span contenteditable>Experience Review</span></td>
						<td style="text-align:right;float:right;">$<span>150.00</span></td>
						<td style="text-align:right;float:right;"><span>4</span></td>
						<td style="text-align:right;float:right;">$<span>600.00</span></td>
					</tr>
					<tr>
						<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
						<td><span contenteditable>Experience Review</span></td>
						<td style="text-align:right;float:right;">$<span>150.00</span></td>
						<td style="text-align:right;float:right;"><span>4</span></td>
						<td style="text-align:right;float:right;">$<span>600.00</span></td>
					</tr>
					<tr>
						<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
						<td><span contenteditable>Experience Review</span></td>
						<td style="text-align:right;float:right;">$<span>150.00</span></td>
						<td style="text-align:right;float:right;"><span>4</span></td>
						<td style="text-align:right;float:right;">$<span>600.00</span></td>
					</tr>
				</tbody>
			</table>

			<br>
			<table border="1" cellspacing="0" cellpadding="2" style="float: right;margin-left:450px;width:100%;text-align:right;border-collapse: separate;">
				<tr>

					<th style="text-align:left;float:left;"><span>Total</span></th>
					<td style="text-align:right;float:right;">$<span>2400.00</span></td>
				</tr>
				<tr>
					<th style="text-align:left;float:left;"><span>Amount Paid</span></th>
					<td style="text-align:right;float:right;">$<span>0.00</span></td>
				</tr>
				<tr>
					<th style="text-align:left;float:left;"><span>Balance Due</span></th>
					<td style="text-align:right;float:right;">$<span>2400.00</span></td>
				</tr>
			</table>
		

		<br>

		<aside>
			<hr>
			<div style="text-align:center;">
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
<style>
header h1 {
    background: #000;
    border-radius: 0.25em;
    color: #FFF;
    margin: 0 0 1em;
    padding: 0.5em 0;
}
h1 {
    font: bold 100% sans-serif;
    letter-spacing: 0.5em;
    text-align: center;
    text-transform: uppercase;
}
</style>
	</body>
</html>';
			//ob_clean();
			//flush();
			//$mpdf = new mPDF();
			$mpdf=new mPDF('utf-8', 'A4', 0, '', 10, 10, 2, 0, 0, 'L'); 
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle("Invoice New");
			$mpdf->SetAuthor("Invoice");
			$mpdf->showImageErrors = true;
			$mpdf->shrink_tables_to_fit = 1;
			$mpdf->SetDisplayMode('fullpage');		 
			$mpdf->WriteHTML($html);
			$filename = 'in';
			$mpdf->Output($filename . '.pdf', 'I');			
			//exit;
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