<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Blog extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module('comments');
		$this->load->model('m_blog');
		$this->pass_data['list_item'] = 'blog';
		$this->passdata['topic_list'] = $this->topic_list();
		$this->passdata['latest_blogs'] = $this->latest_blog_posts();
	}

	function page($page=1)
	{
		$data = $this->passdata;
		$data['topic_list'] = $this->topic_list();
		$data['blog_posts'] = $this->blog_list($page);
		$data['latest_blogs'] = $this->latest_blog_posts();
		$data['content_view'] = 'home/blog';
		$data['pagination'] = $this->createpagination($page);
		$this->template->call_front_end_template($data);
	}

	function createpagination($page = 1)
	{
		$pagination = '';
		$limits = ($page - 1) * 10;
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 1 AND published = 1 ORDER BY published_on DESC");
		$blog_data = $query->result_array();
		$noofblogs = count($blog_data);
		$x = ceil($noofblogs / 10);
		$pagination .= '<li class="disabled"><a href="#">«</a></li>';
		for ($i= 1; $i <= $x; $i++) {
			$disabled = $active = ''; 
			if($page == $i)
			{
				$active = 'active';
			}

			$pagination .= '<li class = "'.$active.'"><a href = "'.base_url().'blog/page/'.$i.'">'.$i.'</a></li>';
		}
		$pagination .= '<li><a href="#">»</a></li>';

		return $pagination;
	}

	function load_blogger()
	{
		// $this->pass_data['blog_list'] = $this->create_blog_list();
		$this->pass_data['content_view'] = 'blog/blog_list';
		$this->template->call_admin_template($this->pass_data);
	}

	function create_blog()
	{
		$message = array();
		$upload_data = $this->upload->uploadanimage('blog_cover', 'uploads/blog_covers');
		if ($upload_data['type'] != 'failed') {
			$_POST['blog_cover'] = $upload_data['path'];
		}

		$_POST['published_on'] = date('Y-m-d H:i:s');
		$saving = $this->m_blog->addblog();

		if ($saving) {
			$message['type'] = 'Success';
			$message['message'] = 'Successfully saved blog';
		}
		else
		{
			$message['type'] = 'Failed';
			$message['message'] = 'Failed to upload blog! Try Again!!!';
		}

		// echo json_encode($message);
		redirect(base_url() . 'dashboard/blog');
	}

	function add_topic()
	{
		$message = array();
		$added = $this->m_blog->add_topic();

		if ($added) {
			$message['type'] = 'Success';
		}
		else
		{
			$message['type'] = 'Failed';
		}

		echo json_encode($message);
	}

	function createtopiclist($type, $is_active)
	{
		$select = $grid = $table = $return_data = '';

		$topics = $this->m_blog->gettopic($is_active);
		$select = '<option value = "0">Select A Topic</option>';

		if ($topics) {
			foreach ($topics as $key => $value) {
				$select .= '<option value = "'.$value['topic_id'].'">'.$value['topic_name'].'</option>';
			}
		}

		switch ($type) {
			case 'select':
				$return_data = $select;
				break;
			
			default:
				# code...
				break;
		}

		echo $return_data;
	}

	function blog_list($page = 1)
	{
		$blog_posts = '';
		$comments = 0;
		$limits = ($page - 1)*10;
		$blogs = $this->m_blog->get_all_published_blogs($limits);

		if ($blogs) {
			$counter = 0;
			foreach ($blogs as $key => $value) {
				$counter++;
				$comments = $this->comments->get_comment_count($value->blog_id)->verified;
					if($value->blog_cover != NULL)
					{
						// $blog_posts .= '<article class="post-wrap">
      //                   <div class="post-media">
      //                       <div class="post-type"><i class="fa fa-picture-o"></i></div>
      //                       <img src="'.$value->blog_cover.'" alt="" height = "424"/>
      //                   </div>
      //                   <div class="post-header">
      //                       <h2 class="post-title"><a href="'.base_url().'blog/read/'.$value->blog_id.'">'.$value->blog_name.'</a></h2>
      //                       <div class="post-meta">'.date('M d, Y', strtotime($value->published_on)).' / Posted in: <a href="#">'.$this->m_blog->get_topic_by_id($value->topic_id)->topic_name.'</a><span class="pull-right"><i class="fa fa-comment"></i> <a href="#">'.$comments.'</a></span></div>
      //                   </div>
      //                   <div class="post-body">
      //                       <div class="post-excerpt">
      //                           <p>'.implode(' ', array_slice(explode(' ', $value->blog_content), 0, 50)).'...</p>
      //                       </div>
      //                   </div>
      //                   <div class="post-footer">
      //                       <span class="post-read-more"><a href="'.base_url().'blog/read/'.$value->blog_id.'" class="btn btn-theme btn-theme-transparent">Read more</a></span>
      //                   </div>
      //               </article>';
                    	$blog_posts .= '<div class="date-outer">
        

          <div class="date-posts">
        
<div class="post-outer">
<article class="post hentry">
<a content="#"></a>
<a href="'.base_url().'blog/read/'.$value->blog_id.'"><div class="img-thumbnail"><img width="260" height="170" src="'.$value->blog_cover.'" alt="'.$value->blog_name.'" title="'.$value->blog_name.'"></div>
</a>
<span class="label-p">
<a href="#" rel="tag">Article</a>
<a href="#" rel="tag">Blogger</a>
</span>
<h2 class="post-title entry-title" itemprop="name">
<a href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'">
'.$value->blog_name.'
</a>
</h2>
<div class="post-info">
<span class="author-info">
<i class="fa fa-user"></i>
<span class="vcard">
<span class="fn">
<a class="g-profile" href="#" rel="author" title="author profile" data-gapiscan="true" data-onload="true" data-gapiattached="true">
<span>Admin</span>
</a>
</span>
</span>
</span>
<span class="time-info">
<i class="fa fa-calendar"></i>
<a class="timestamp-link" href="#" rel="bookmark" title="permanent link"><abbr class="published updated timeago" title="06.41">'.date('M d, Y', strtotime($value->published_on)).'</abbr></a>
</span>
<span class="comment-info">
<i class="fa fa-comments"></i>
<a href="#" onclick="">
'.$comments.' Comments
</a>
</span>
</div>
<div class="post-header">
<div class="post-header-line-1"></div>
<span class="post-author vcard" itemscope="itemscope" itemtype="http://schema.org/Person">
<span class="fn author">
<a href="#" rel="author" title="author profile">
<span itemprop="name">Admin</span>
</a>
</span>
</span>
</div>
<div class="post-body entry-content" id="post-body-3914700255083592688">
<div>
   '.implode(' ', array_slice(explode(' ', strip_tags($value->blog_content)), 0, 10)).'...
</div>
<a class="read-more" href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'"> Read More </a>
<div style="clear:both"></div>
</div>
</article>
</div>

            </div></div>';
					}
					else
					{
						$blog_posts .= '<div class="date-outer">
        

          <div class="date-posts">
        
<div class="post-outer">
<article class="post hentry">
<a content="#"></a>
<a href="'.base_url().'blog/read/'.$value->blog_id.'"><div class="img-thumbnail"><img width="260" height="170" src="'.base_url().'assets/images/no-image-available.jpg" alt="'.$value->blog_name.'" title="'.$value->blog_name.'"></div>
</a>
<span class="label-p">
<a href="#" rel="tag">Article</a>
<a href="#" rel="tag">Blogger</a>
</span>
<h2 class="post-title entry-title" itemprop="name">
<a href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'">
'.$value->blog_name.'
</a>
</h2>
<div class="post-info">
<span class="author-info">
<i class="fa fa-user"></i>
<span class="vcard">
<span class="fn">
<a class="g-profile" href="#" rel="author" title="author profile" data-gapiscan="true" data-onload="true" data-gapiattached="true">
<span>Admin</span>
</a>
</span>
</span>
</span>
<span class="time-info">
<i class="fa fa-calendar"></i>
<a class="timestamp-link" href="#" rel="bookmark" title="permanent link"><abbr class="published updated timeago" title="06.41">'.date('M d, Y', strtotime($value->published_on)).'</abbr></a>
</span>
<span class="comment-info">
<i class="fa fa-comments"></i>
<a href="#" onclick="">
'.$comments.' Comments
</a>
</span>
</div>
<div class="post-header">
<div class="post-header-line-1"></div>
<span class="post-author vcard" itemscope="itemscope" itemtype="http://schema.org/Person">
<span class="fn author">
<a href="#" rel="author" title="author profile">
<span itemprop="name">Admin</span>
</a>
</span>
</span>
</div>
<div class="post-body entry-content" id="post-body-3914700255083592688">
<div>
   '.implode(' ', array_slice(explode(' ', $value->blog_content), 0, 10)).'...
</div>
<a class="read-more" href="'.base_url().'blog/read/'.$value->blog_id.'" title="'.$value->blog_name.'"> Read More </a>
<div style="clear:both"></div>
</div>
</article>
</div>

            </div></div>';
					}
			}
		}
		else
		{
			$blog_posts = '<center><h3>No blog posts yet</h3></center>';
		}

		return $blog_posts;
	}

	function topic_list()
	{
		$topic_list = '';
		$topics = $this->m_blog->get_blog_titles();

		if ($topics) {
			foreach ($topics as $key => $value) {
				$topic_list .= ' <li><a href="#">'.$value->topic_name.'
                                <small>'.$value->blog_count.'</small>
                            </a></li>';
			}
		}
		else
		{
			$topic_list = 'Nothing has been posted';
		}

		return $topic_list;
	}

	function latest_blog_posts()
	{
		$latest_blog = '';
		$blog_list = $this->m_blog->get_latest_blogs();
		// echo "<pre>";print_r($blog_list);die;

		if ($blog_list) {
			foreach ($blog_list as $key => $value) {
				// $latest_blog .= '<div class="media">
    //                                 <a class="pull-left" href="'.base_url().'blog/read/'.$value->blog_id.'">
    //                                     <img class="media-object" src="'.$value->blog_cover.'" alt="" width = "50" height = "50">
    //                                 </a>
    //                                 <div class="media-body">
    //                                     <h4 class="media-heading"><a href="'.base_url().'blog/read/'.$value->blog_id.'">'.$value->blog_name.'</a></h4>
    //                                     <p>'.implode(' ', array_slice(explode(' ', $value->blog_content), 0, 10)).'...</p>
    //                                     <p class="post-date"><i class="fa fa-calendar"></i> '.date('M d, Y', strtotime($value->published_on)).'</p>
    //                                 </div>
    //                             </div>';
				$image = ($value->blog_cover) ? $value->blog_cover : base_url().'assets/images/no-image-available.jpg';
                $latest_blog .= '<li><a class="arl-tmb" href="'.base_url().'blog/read/'.$value->blog_id.'" style="background:url('.$image.') no-repeat center center;background-size: cover"></a><div class="post-panel"><h3 class="rcp-title"><a href="'.base_url().'blog/read/'.$value->blog_id.'">'.$value->blog_name.'</a></h3><span class="recent-date">'.date('M d, Y', strtotime($value->published_on)).'</span><span class="recent-author">Admin</span></div></li>';
			}
		}
		else
		{
			$latest_blog .= '<li>No blogs yet</li>';
		}

		return $latest_blog;
	}
	function read($blog_id)
	{
		$blog_content = '';
		$comments = $this->comments->get_comment_count($blog_id)->verified;
		$blog = $this->m_blog->get_blog_by_id($blog_id);
		$blog_content .= '<img src = "' . $blog->blog_cover .'" style = "width: 100%" />
		<h3>'.$blog->blog_name.'</h3>
		Published On: '.date('M d, Y', strtotime($blog->published_on)).'<br />;
		' . $blog->blog_content;
		$category = $this->m_blog->get_topic_by_id($blog->topic_id)->topic_name;
		$this->passdata['blog_image'] = $blog->blog_cover;
		$this->passdata['blog_data'] = $blog->blog_content;
		$this->passdata['published_on'] = $blog->published_on;
		$this->passdata['category'] = $category;
		$this->passdata['comments'] = $comments;
		$this->passdata['blog_name'] = $blog->blog_name;
		$this->passdata['blog_content'] = $blog_content;
		$this->passdata['content_view'] = 'home/blog_read';
		$this->passdata['blog_id'] = $blog_id;
		$this->template->call_front_end_template($this->passdata);
	}

	function create_topics_table()
	{
		$topics_table = '';
		$topics = $this->m_blog->get_blog_titles();

		if ($topics) {
			$counter = 1;
			foreach ($topics as $key => $value) {
				$topics_table .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$value->topic_name.'</td>
				<td>'.$value->description.'</td>';
				$committing = '';
				if ($value->is_active == 1) {
					$committing = '<td><a href = "#"><i class = "fa fa-pencil"></i> Edit</a></td>
					<td><a href = "#"><i class = "fa fa-trash"></i> Delete</a></td>';
				}
				else
				{
					$committing = '<td><a href = "#">Restore First</a></td>
					<td><a href = "#"><i class = "fa fa-refresh"></i> Refresh</a></td>';
				}
				$topics_table .= $committing .'</tr>';
				$counter++;
			}
		}

		echo $topics_table;
	}

	function updateblog()
	{
		$update = $this->m_blog->updateblog();

		$message = array();

		if(!$update)
		{
			$message['type'] = 'success';
			$message['message'] = 'Successfully updated';
		}
		else
		{
			$message['type'] = 'error';
			$message['message'] = 'Could not update blogs';
		}

		echo json_encode($message);
	}

	function activation($type, $blog_id)
	{
		$is_active = ($type == 'activate') ? 1 : 0;
		$update_data = array(
			'is_active' => $is_active
			);

		$this->db->where('blog_id', $blog_id);
		$update = $this->db->update('blogs', $update_data);
		redirect(base_url() . 'dashboard/blog#allblog');
	}

	function get_blog_details($blog_id)
	{
		$blog_details = $this->m_blog->get_blog_details($blog_id);

		return $blog_details;
	}

	function createallblog()
	{
		$blog_table = '';
		$blogs = $this->m_blog->get_all_blogs();

		if ($blogs) {
			$counter = 0;
			foreach ($blogs as $key => $value) {
				$counter++;
				$blog_table .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$value->blog_name.'</td>
				<td>'.date("F d, Y", strtotime($value->created_on)).'</td>
				<td><center>';
				if ($value->published == 0) {
					$blog_table .= '<a class = "label label-danger">Waiting</a>';
				}
				else
				{
					$blog_table .= '<a class = "label label-success">Published</a>';
				}
				$blog_table .= '</center></td><td><center>';
				if ($value->is_active == 0) {
					$blog_table .= '<a href = "'.base_url().'blog/activation/activate/'.$value->blog_id.'"><i class = "ion ion-ios-loop-strong"></i></a>';
				}
				else
				{
					$blog_table .= '<a href = "'.base_url().'blog/activation/deactivate/'.$value->blog_id.'"><i class = "ion ion-android-delete"></i></a>';
				}
				$blog_table .= '</center></td>
				<td><a href = "#" class = "action-page" data-target = "content-container" data-view = "blog_editblog_'.$value->blog_id.'" data-title = "Editting: '.$value->blog_name.'" onclick = "load_view(this);"><i class = "ion ion-edit"></i></a>';
				$blog_table .= '</td></tr>';
			}
		}

		$data['all_blogs'] = $blog_table;
		$this->load->view('blog/allblog', $data);
	}
	function editblog($blog_id)
	{
		$topic_list = $blog_details = '';
		$topics = $this->m_blog->gettopic(1);
		$blog = $this->m_blog->get_blog_by_id_all($blog_id);

		if ($topics) {
			foreach ($topics as $key => $value) {
				$selected = ($value['topic_id'] == $blog->topic_id) ? 'selected' : '';
				$topic_list .= '<option value = "'.$value['topic_id'].'" '.$selected.'>'.$value['topic_name'].'</option>';
			}
		}
		$data['topic_list'] = $topic_list;
		$data['blog_details'] = $blog;
		$this->load->view('blog/editblog', $data);
	}

	function update_blog()
	{
		$upload_data = array();
		if('cover_image')
		{
			$upload_data = $this->upload->uploadanimage('blog_cover', 'uploads/blog_covers');
			if($upload_data['type'] != 'failed')
			{
				$_POST['blog_cover'] = $upload_data['path'];
			}
			
		}

		$update = $this->m_blog->update_blog_clean();

		redirect(base_url() .'dashboard/blog#allblogs');
	}
}