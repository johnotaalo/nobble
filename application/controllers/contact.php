<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Contact extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_contact');
	}

	function index()
	{
		$data['content_view'] = 'home/contact_us';
		$this->template->call_front_end_template($data);
	}

	function submit_contact()
	{
		$message = '';
		$submission = $this->m_contact->submit_contact();
		$email_address = $this->input->post('contact_email');
		$contact_name = $this->input->post('contact_name');

		if ($submission) {
			$contact_id = mysql_insert_id();

			$message .= "Hi there, " .$contact_name. ". We have received your contact request of id: ".$contact_id.".<br/> We will get in touch with you as soon as possible via this email: " .$email_address.". If you did not send this email, please contact the administrator via admin@nobbledrug.com";

			$email_sent = $this->send_email($email_address, $message);

			echo "<pre>";print_r($email_sent);die;
		}
	}
}