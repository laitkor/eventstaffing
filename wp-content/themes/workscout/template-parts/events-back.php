<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/workscout-child/jQuery-flexImages-master/jquery.flex-images.js"></script>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-container'); ?>>  
  <?php 
  if ( ! post_password_required() ) { 
      if(has_post_thumbnail()) { ?>
      <?php 
        $attachments = get_children(array('post_parent' => $post->ID,
                        'post_status' => 'inherit',
                        'post_type' => 'attachment',
                        'post_mime_type' => 'image',
                        'order' => 'ASC',
                        'orderby' => 'menu_order ID'));
        ?>
      <div id="demo" class="flex-images">
        <?php 

        foreach($attachments as $att_id => $attachment) {
          $full_img_url = wp_get_attachment_url($attachment->ID); ?>            
            <div class="item">
              <img src="<?php echo $full_img_url; ?>" alt="" title=""/>     
            </div>              
          <?php          
        }
    ?>
      </div> 
    <script type="text/javascript">
    jQuery('#demo').flexImages({     
        //rowHeight: 100,     
    });
    </script>
      <!-- <div class="post-img">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();  ?><div class="hover-icon"></div></a>
      </div> -->
      <?php } 
  }?>

  <section class="post-content">

    <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
   
    <div class="meta-tags">
      <?php workscout_posted_on(); ?>
    </div>
    
    <?php the_excerpt(); ?>

    <a href="<?php the_permalink(); ?>" class="button"><?php esc_html_e('Read More','workscout') ?></a>

  </section>

</article>