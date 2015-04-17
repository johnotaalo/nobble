<dl>
     <legend>Commenter Details</legend>
     <table class = "table">
          <tr>
               <th><i class = "ion ion-android-person"></i>&nbsp;&nbsp;Name</th>
               <td><?php echo $comment_data->comment_user_name; ?></td>
          </tr>
          <tr>
               <th><i class = "ion ion-ios-email"></i>&nbsp;&nbsp;Email</th>
               <td><?php echo $comment_data->comment_user_email; ?></td>
          </tr>
          <tr>
               <th><i class = "ion ion-android-calendar"></i>&nbsp;&nbsp;Posted On</th>
               <td><?php echo date('F d, Y', strtotime($comment_data->created_on)) . ' at ' .  date('H:i:s', strtotime($comment_data->created_on)); ?></td>
          </tr>
     </table>
     
</dl>
<legend>Comment</legend>
<blockquote>
<p><?php echo $comment_data->comment_user_comment; ?></p>
<small>Comment By: <cite title=""><?php echo $comment_data->comment_user_name; ?></cite></small>
</blockquote>

<legend></legend>
<div class="row">
     <div class = "col-md-7 pull-right">
          <?php
               if($comment_data->verified == 1)
               {
                    echo '<span class = "label label-success"><i class = "ion ion-check-round"></i>&nbsp;&nbsp;The comment has already been verified</span>
                    <a href = "' .base_url() .'comments/verification/'.$comment_data->comment_id.'/0" class = "btn btn-danger btn-sm">Unverify</a>';
               }
               else
               {
                    echo '<span class = "label label-danger"><i class = "ion ion-close-round"></i>&nbsp;&nbsp;The comment has not been verified</span>
                    <a href = "' .base_url() .'comments/verification/'.$comment_data->comment_id.'/1" class = "btn btn-success btn-sm">Verify</a>';
               }
          ?>
     </div>
</div>