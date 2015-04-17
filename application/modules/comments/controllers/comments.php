<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Comments extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_comments');
		$this->load->module('blog');
	}

	function submit_comment($type = NULL)
	{
		$message = array();
		$insertion = $this->m_comments->submit_comment();


		if ($insertion) {
			$message['type'] = 'success';
			$message['message'] = "Successfully Posted Your Comment. It will appear in the comments section as soon as it is verified";
		}
		else
		{
			$message['type'] = 'error';
			$message['message'] = "Error during insertion";
		}

		if ($type == 'ajax') {
			echo json_encode($message);
		}
		else
		{
			return $message;
		}

	}

	function get_comment_count($comment_blog_id = NULL)
	{
		$count = $this->m_comments->get_comment_count($comment_blog_id);

		if (!$count) {
			$count = (object) array('verified' => 0, 'not_verified' => 0);
		}

		return $count;
	}

	function allcomments()
	{
		//get the comments from the model
		$comments = $this->m_comments->get_all_comments();

		//create empty array and variable that will hold HTML
		$cleaned_comments = array();
		$accordion = '';

		if ($comments) {//check whether the comments are available
			//if true->create an array with the comments grouped by the blog_id
			foreach ($comments as $key => $value) {
				$cleaned_comments[$value->comment_blog_id][] = $value;
			}
			// echo "<pre>";print_r($cleaned_comments);die;
			//take the grouped comments and create the accordion
			$counter = 1;
			$accordion = '<div class="box-group" id="accordion">';
			foreach ($cleaned_comments as $key => $value) {
				$blog_details = $this->blog->get_blog_details($key);
				$comment_count = $this->get_comment_count($key);
				$accordion .= '<div class="panel box box-primary">';
				$accordion .= '<div class="box-header with-border">';
				$accordion .= '<h4 class="box-title pull-left"><a data-toggle="collapse" data-parent="#accordion" href="#collapse_'.$counter.'" aria-expanded="false" class="collapsed">'.$blog_details->blog_name.'</a></h4>';
				$accordion .= '<div class = "pull-right"><span class = "label label-danger">'.$comment_count->not_verified.' Not Verified</span>&nbsp;<span class = "label label-success">'.$comment_count->verified.' Verified</span></div>';
				$accordion .= '</div>';
				$accordion .= '<div id="collapse_'.$counter.'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">';
				$accordion .= '<div class="box-body">';
				$accordion .= '<table class = "table table-bordered">';
				$accordion .= '<thead>
				<th>#</th>
				<th>User Email</th>
				<th>Comment</th>
				<th>Expand</th>
				<th>Status</th>
				<th>Action</th>
				</thead><tbody>';
				//content ya ndani
				$c = 1;
				foreach ($value as $k => $v) {
					$accordion .= '<tr>
					<td>'.$c.'</td>
					<td>'.$v->comment_user_email.'</td>
					<td>'.implode(' ', array_slice(explode(' ', $v->comment_user_comment), 0, 10)).'...</td>
					<td><center><a href = "#" class = "action" onclick="load_view(this)" data-target = "form-modal-body" data-type = "action-modal" data-title = "'.$blog_details->blog_name.' Comment" data-view = "comments_commentsdetails_'.$v->comment_id.'"><i class = "ion ion-arrow-expand"></i></a></center></td>';
					$accordion .= '<td>';
					$accordion .= ($v->verified == 1) ? '<a href = "#" class = "label label-success">Verified</a>' : '<a href = "#" class = "label label-danger">Not Verified</a>';
					$accordion .= '</td>';
					$accordion .= '<td>';
					$accordion .= ($v->verified == 0) ? '<a href = "' .base_url() .'comments/verification/'.$comment_data->comment_id.'/1" class = "label label-success">Verify</a>' : '<a href = "' .base_url() .'comments/verification/'.$comment_data->comment_id.'/0" class = "label label-danger">Unverify</a>';
					$accordion .= '</td>';
					$accordion .= '</tr>';
					$c++;
				}
				$accordion .= '</tbody></table>';
				//finish inner body
				$accordion .= '</div>';
				$accordion .= '</div>';
				$accordion .= '</div>';
				$counter++;
			}
			$accordion .= '</div>';

		}
		else //return no data
		{

		}

		echo $accordion;
	}

	function commentsdetails($comment_id)
	{
		$comment_details = $this->m_comments->get_comment_by_id($comment_id);

		$blog_details = $this->blog->get_blog_details($comment_id);

		$comment_data['comment_data'] = (object) array_merge((array) $comment_details, (array) $blog_details);

		$this->load->view('comments/commentdetails', $comment_data);
	}

	function verification($comment_id, $verification)
	{
		$verification_data = array('verified' => $verification);
		$this->db->where('comment_id', $comment_id);
		$verification = $this->db->update('comments', $verification_data);

		if($verification)
		{
			redirect(base_url() .'dashboard/blog#comments');
		}
	}
}