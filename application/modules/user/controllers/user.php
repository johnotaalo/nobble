<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->pass_data['list_item'] = 'user';
	}

	function index()
	{
		$this->load->view('user_v');
	}

	function authenticate()
	{
		$auth = $this->m_user->authenticate();

		if(count($auth) == 1)
		{
			$admin_id = $auth->admin_id;
			$admin_details = $this->m_user->get_admin_data($admin_id);

			$this->session->set_userdata($admin_details);
			$this->session->set_userdata('logged_in', true);


			redirect(base_url() . 'dashboard');
		}

		else
		{
			$data['login'] = 0;
			$this->load->view('user_v', $data);
		}
	}

	function user_management()
	{
		$this->pass_data['content_view'] = 'user/user_list';
		$this->template->call_admin_template($this->pass_data);
	}

	function check_login()
	{
		if($this->session->userdata('logged_in') == false)
		{
			redirect(base_url().'user');
		}
	}

	function addadmin()
	{
		$upload_path = 'uploads/adminprofiles';
		$upload = 'profile_picture';
		$upload_data = $this->upload->uploadanimage($upload, $upload_path);

		if ($upload_data['type'] == 'success') {
			$_POST['profile'] = $upload_data['path'];
			$insertion = $this->m_user->addadmin();

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			if ($insertion) {
				$admin_id = mysql_insert_id();
				$username = $this->create_username($first_name, $last_name, $admin_id);

				$insert_user = $this->m_user->add_user($username, $admin_id);

				if ($insert_user) {
					$email = $this->input->post('email_address');
					$message = '<div style = "padding: 10px;">
					<center><h3>User Registration</h3></center>
					<p style = "font-family: times !important;">
					Hi, Please go to <a href = "'.base_url().'user">Nobbledrug.com</a> to access the dashboard with the following credentials.
					<br/>
					Username: '.$username.'<br/>
					Password: 12345
					</p>
					</div>';
					$subject = 'NobbleDrg: User Confirmation';
					$email = $this->send_email($email, $message, $subject);
					if ($email) {
						redirect(base_url().'dashboard/users');
					}
					else
					{
						echo "Error while sending email";
					}
				}
			}
			else
			{
				echo "There was an error while adding a user. Try again";
			}
		}
		else
		{
			echo "Could not upload photo";
		}
	}

	function create_username($first_name, $last_name, $admin_id)
	{
		$username = '';
		$username = strtolower($first_name .'.'.$last_name.'_'.$admin_id);

		return $username;
	}

	function logout()
	{
		$this->session->sess_destroy();
	}
}