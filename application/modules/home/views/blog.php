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
    
    .post {
        background: #fff;
        color: #333;
        margin: 0 0 20px 0;
        padding: 0 10px 0 0;
        border: none;
        box-shadow: 0 0 0 1px #eee;
        transition: all 0.3s linear;
        position: relative;
        min-height: 0;
    }
    .post .label-p {
        position: absolute;
        top: 20px;
        left: 20px;
        margin: 0 auto;
        width: auto;
        z-index: 1;
    }
    .img-thumbnail {
        overflow: hidden;
        background: #444;
        position: relative;
        float: left;
        width: 260px;
        height: 170px;
        margin: 20px;
        z-index: 1;
        padding: 0;
    }
    .img-thumbnail img {
        width: 260px;
        height: 170px;
        position: relative;
    }
    .label-p a {
        font-weight: 700;
        background: rgba(0,0,0,0.3);
        color: rgba(255,255,255,0.8);
        font-size: 13px;
        display: block;
        float: left;
        padding: 6px 12px;
        margin: 0;
        transition: all .3s ease-out;
    }
    .label-p a:nth-child(n+2) {
        display: none;
    }
    h2.post-title {
        color: #333;
        z-index: 0;
        font-family: 'Open Sans',sans-serif;
        font-size: 18px;
        font-weight: 700;
        padding: 15px 0;
        text-transform: none;
        padding-bottom: 0;
        text-align: left;
        border-bottom: none;
        border-top: none;
        clear: initial;
    }
    h2.post-title a, h1.post-title a, h2.post-title, h1.post-title {
        color: #333;
        z-index: 0;
    }
    .author-info, .review-info, .comment-info, .time-info {
        margin-right: 8px;
        display: inline;
        color: #333;
    }
    .post-info {
        margin-top: 0;
        margin-bottom: 0;
        padding: 0;
        margin-right: 15px;
        margin-left: 15px;
        color: #333;
        font-size: 11px;
        background: transparent;
        text-align: left;
        box-shadow: none;
    }
    .post-header, .post-footer {
        line-height: initial;
        width: 0;
        height: 0;
    }
    span.post-author.vcard {
        visibility: hidden;
        width: 0;
        height: 0;
    }
    .post-body {
        line-height: 1.6em;
        color: #333;
        margin-right: 10px;
        font-size: 12px;
        text-overflow: ellipsis;
    }
    a.read-more {
        position: absolute;
        display: inline-block;
        bottom: 20px;
        background-color: #aaa;
        color: #fff;
        padding: 5px 10px 4px;
        font-family: 'Open Sans';
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 2px;
        transition: all .3s ease-out;
    }
    a.read-more:after {
        content: '\f0da';
        font-family: Fontawesome;
        font-weight: normal;
        text-align: center;
        margin-left: 5px;
        display: inline-block;
        transition: all .3s ease-out;
    }
</style>
<section class="page-section no-padding-top with-sidebar" style = "margin-top: 25px;">
        <div class="container">
            <div class="row">

                <!-- content -->
                <section id="content" class="content col-sm-8 col-md-9">
                    <div class = "blog-posts hfeed">
                    <!-- Blog posts -->
                    <?php echo $blog_posts; ?>
                    <!-- /Blog posts -->
                    </div>
                    <!-- Pagination -->
                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            <?php echo $pagination; ?>
                        </ul>
                    </div>
                    <!-- /Pagination -->

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
                            <!--<div class="tab-pane fade in active" id="recent">
                                <?php echo $latest_blogs; ?>
                            </div> -->
                        </div>
                    </div>
                </aside>
                <!-- /sidebar -->

            </div>
        </div>
    </section>