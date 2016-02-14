<div id="kommentar_formular">
 
<h3 id="respond">Was sagst Du dazu? Hinterlasse einen Kommentar.</h3>
 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
 
   <p>
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" />
      <label for="author">Name</label>
   </p>
 
   <p>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
      <label for="email">E-Mail Adresse <small>(wird nicht veröffentlicht)</small></label>
   </p>
 
   <p>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
      <label for="url">Webseite</label>
   </p>
 
   <p>
      <div class="deinkommentar">Dein Kommentar
      <textarea name="comment" id="comment" style="width: 100%;" rows="10" tabindex="4"></textarea></div>
   </p>
 
   <p>
      <input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar abschicken" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
   </p>
 
   <?php do_action('comment_form', $post->ID); ?>
 
</form>
 
</div> <!-- kommentar_formular -->
 
<div id="kommentare">
 <h3>Hier sind die letzten Kommentare!</h3>
   <?php foreach ($comments as $comment) : ?>
 
      <div class="comment" id="comment-<?php comment_ID() ?>">
      		<div class="gravatar"><?php echo get_avatar( 'email@example.com', 50 ); ?></div>
 
         <small class="commentmetadata"><?php comment_author_link() ?> <strong>|</strong> am <?php comment_date('j. F Y') ?> um <?php comment_time('H:i') ?> Uhr</small>
 
         <?php comment_text() ?>
 
          <?php if ($comment->comment_approved == '0') : ?>
            <strong>Achtung: Dein Kommentar muss erst noch freigegeben werden.</strong><br />
         <?php endif; ?>
 					
      </div>
   <?php endforeach; /* end for each comment */ ?>
</div><!-- kommentare -->