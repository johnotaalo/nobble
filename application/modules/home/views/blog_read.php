<style type="text/css">
    a:hover
    {
        text-decoration: none;
    }
    ul.recpost {
        background: #fff;
        color: #333;
        overflow: visible;
    }
    .recpost li {
        overflow: hidden;
        padding: 10px 0;
        background: #fff;
        color: #333 !important;
        float: none!important;
    }
    .recpost .arl-tmb {
        display: block;
        width: 60px;
        height: 60px;
        float: left;
        margin-right: 10px;
    }
    .recpost .post-panel {
        margin-left: 70px;
    }
    .recpost .rcp-title {
        font-family: 'Open Sans';
        font-size: 14px;
        font-weight: 700;
        margin: 0 0 6px 0;
    }
    .recent-date {
        color: #999;
        font-weight: 400;
        font-size: 12px;
    }
    .recent-author {
        margin-left: 10px;
        color: #999;
        font-weight: 400;
        font-size: 12px;
    }
</style>
       <section class="page-section no-padding-top with-sidebar">
        <div class="container">
            <div class="row">

                <!-- content -->
                <section id="content" class="content col-sm-8 col-md-9">

                    <article class="post-wrap">
                        <div class="post-media">
                            <div class="post-type"><i class="fa fa-camera-o"></i></div>
                            <?php if($blog_image){ ?>
                            <img src="<?php echo $blog_image; ?>" style = "height: 303px;" />
                            <?php } ?>
                        </div>
                        <div class="post-header">
                            <h2 class="post-title"><?php echo $blog_name; ?></h2>
                            <div class="post-meta"><?php echo date('F d, Y'); ?> / Posted in: <a href="#"><?php echo $category; ?></a><span class="pull-right"><i class="fa fa-comment"></i> <a href="#"><?php echo $comments; ?></a></span></div>
                        </div>
                        <!-- <div class = "social-media">
                            <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                            <span class='st_facebook_hcount' displayText='Facebook'></span>
                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                            <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                            <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                            <span class='st_email_hcount' displayText='Email'></span>
                        </div> -->
                        <div class="post-body">
                            <?php echo $blog_data; ?>
                        </div>
                    </article>

                    <!-- About the author -->
                   <!--  <div class="about-the-author clearfix">
                        <div class="media">
                            <img class="media-object pull-left" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-1.jpg" alt="">
                            <div class="media-body">
                                <h4 class="media-heading">Posted by <a href="#">John Doe</a></h4>
                                <p>Praesent in tincidunt lorem. Nam in magna ut odio pharetra mollis at sit amet
                                    elit. Praesent tincidunt nisi non tellus varius euismod. Proin eget venenatis
                                    ipsum, vitae malesuada turpis. </p>
                            </div>
                        </div>
                    </div> -->
                    <!-- /About the author -->

                    <!-- Comments -->
                    <!-- <div class="comments">
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-3.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit, a placerat magna est nec justo. Nam iaculis velit at lacus gravida, et dictum nulla dapibus.</p>
                                <p class="comment-reply"><a href="#">Reply this comment</a></p>
                            </div>
                        </div>
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-2.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit.</p>
                                <p class="comment-reply"><a href="#">Reply this comment</a></p>
                            </div>
                        </div>
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-4.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit.</p>
                                <p class="comment-reply"><a href="#">Reply this comment</a></p>
                                <div class="media comment">
                                    <a href="#" class="pull-left comment-avatar">
                                        <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-1.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit, a placerat magna est nec justo. Nam iaculis velit at lacus gravida, et dictum nulla dapibus.</p>
                                        <p class="comment-reply"><a href="#">Reply this comment</a></p>
                                    </div>
                                </div>
                                <div class="media comment">
                                    <a href="#" class="pull-left comment-avatar">
                                        <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-5.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit.</p>
                                        <p class="comment-reply"><a href="#">Reply this comment</a></p>
                                    </div>
                                </div>
                                <div class="media comment">
                                    <a href="#" class="pull-left comment-avatar">
                                        <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-2.jpg" class="media-object">
                                    </a>
                                    <div class="media-body">
                                        <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit.</p>
                                        <p class="comment-reply"><a href="#">Reply this comment</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-6.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit, a placerat magna est nec justo. Nam iaculis velit at lacus gravida, et dictum nulla dapibus.</p>
                                <p class="comment-reply"><a href="#">Reply this comment</a></p>
                            </div>
                        </div>
                        <div class="media comment">
                            <a href="#" class="pull-left comment-avatar">
                                <img alt="" src="<?php echo base_url();?>assets/frontend/img/preview/avatars/avatar-v2-7.jpg" class="media-object">
                            </a>
                            <div class="media-body">
                                <p class="comment-meta"><span class="comment-author"><a href="#">John Doe</a> <span class="comment-date"> / February 2, 2014 at 8:55 pm</span></span></p>
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque suscpit ipsum sed sapien dignissim, eu blandit mi volutpat. Curabitur tincidunt, tellus sit amet rutrum sodales, velit orci consectetur velit, a placerat magna est nec justo. Nam iaculis velit at lacus gravida, et dictum nulla dapibus.</p>
                                <p class="comment-reply"><a href="#">Reply this comment</a></p>
                            </div>
                        </div>
                    </div> -->
                    <!-- /Comments -->
                     <div class = "social-media">
                        <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                        <span class='st_facebook_hcount' displayText='Facebook'></span>
                        <span class='st_twitter_hcount' displayText='Tweet'></span>
                        <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                        <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                        <span class='st_email_hcount' displayText='Email'></span>
                    </div>
                    <!-- Leave a Comment -->
                    <div class="comments-form">
                        <h4 class="block-title">Leave a Comment</h4>
                        <form method="POST" action="<?php echo base_url();?>comments/submit_comment/ajax" id="comments_form">
                            <div class="form-group"><input type="text" placeholder="Name" class="form-control" title="comments-form-name" name="comment_user_name"></div>
                            <div class="form-group"><input type="text" placeholder="Email" class="form-control" title="comments-form-email" name="comment_user_email"></div>
                            <div class="form-group"><textarea placeholder="Your Message ..." class="form-control" title="comments-form-comments" name="comment_user_comment" rows="6"></textarea></div>
                            <input type = "hidden" name = "comment_blog_id" value = "<?php echo $blog_id; ?>" />
                            <div class="form-group"><button type="submit" class="btn btn-theme" id="submit">Send Comment</button></div>
                        </form>
                        <div id = "result"></div>
                    </div>
                    <!-- /Leave a Comment -->

                </section>
                <!-- /content -->

                <!-- sidebar -->
                <aside id="sidebar" class="sidebar col-sm-4 col-md-3 ">

                    <div class="widget widget-categories">
                        <h4 class="widget-title">Blog Posts Archive</h4>
                        <ul>
                            <?php echo $topic_list; ?>
                        </ul>
                    </div>

                     <div class="widget">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#recent" data-toggle="tab">Recent</a></li>
                        </ul>
                        <div class="tab-content">
                            <ul class = "recpost">
                                <?php echo $latest_blogs; ?>
                            </ul>
                        </div>
                    </div>

                </aside>
                <!-- /sidebar -->

            </div>
        </div>
    </section>
<!-- javascript
    ================================================== -->
<script type="text/javascript">
    $('#comments_form').submit(function( event ) {
        var formData = new FormData($('#comments_form')[0]);
        var form_action = $('#comments_form').attr('action');
        event.preventDefault();
        $.ajax({
            url : form_action,
            type: "POST",
            data : formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(xhr)
            {
                // console.log('Please Wait');
                $('#preloader').delay(200).fadeIn(200);
                $('#result').html('<center><i class = "fa fa-spinner fa-spin"></i>Please wait...</center>');
            },
            success:function(data, textStatus, jqXHR) 
            {
                $('#preloader').delay(200).fadeOut(200);
                $('#submit').html('Send Comment');
                obj = jQuery.parseJSON(data);
                if (obj.type === 'success') {
                    $('#result').html('<center><p style = "color: green">'+obj.message+'</p></center>');
                }
                else
                {
                    $('#result').html('<center><p style = "color: red">'+obj.message+'</p></center>');
                }
            }
        })
        });
</script>
</body>
</html>