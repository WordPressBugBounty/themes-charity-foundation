<?php //to use wp udpate plugin
wp_enqueue_script( 'updates' ); ?>

<div class="theme-offer">
  <?php 
  if(isset($_GET['import-demo'])){
    $home_id=''; $blog_id=''; $page_id=''; $about_id='';


    // Function to check if a page with a specific title exists
    function page_exists_by_title($title) {
      $page_query = new WP_Query(array(
          'post_type'   => 'page',
          'title'       => $title,
          'post_status' => 'publish',
          'numberposts' => 1
      ));
      
      if ($page_query->have_posts()) {
          // Return the ID of the first matching page
          $page = $page_query->posts[0];
          return $page->ID;
      }
    
      return false; // Return false if no page found
    }

    //Homepage
    $home_title = 'Home';
    if (!page_exists_by_title($home_title)) {
      $home_content = '';
      $home = array(
        'post_type'    => 'page',
        'post_title'   => $home_title,
        'post_content' => $home_content,
        'post_status'  => 'publish',
        'post_author'  => 1,
        'post_name'    => 'home'
      );

      $home_id = wp_insert_post($home);
      
      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');

    }else {
      // Get the ID of the existing page
      $home_id = page_exists_by_title($home_title);

      // Set the home page template
      add_post_meta($home_id, '_wp_page_template', 'page-template/custom-home-page.php');
      
      // Set the static front page
      update_option('page_on_front', $home_id);
      update_option('show_on_front', 'page');
    }
    


    // Create a Page if it doesn't exist
    if ( !page_exists_by_title('Page') ) {
      $page_title = 'Page';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page'
      );
      $page_id = wp_insert_post($ot_page);
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page');
    }

    if ( !page_exists_by_title('Page Left Sidebar') ) {
      $page_title = 'Page Left Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-left'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/left-sidebar.php');
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page Left Sidebar');
    }

    if ( !page_exists_by_title('Page Right Sidebar') ) {
      $page_title = 'Page Right Sidebar';
      $content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

      $ot_page = array(
        'post_type'     => 'page',
        'post_title'    => $page_title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'page-right'
      );
      $page_id = wp_insert_post($ot_page);

      // Set the page template
      add_post_meta($page_id, '_wp_page_template', 'page-template/right-sidebar.php');
    }else {
      // Get the ID of the existing page
      $ot_page = page_exists_by_title('Page Right Sidebar');
    }

    // ------- Create Left Menu --------
    $menuname =  'Main Menu';
    $bpmenulocation = 'primary';
    $menu_exists = wp_get_nav_menu_object( $menuname );

    if (!$menu_exists) {
      // Create the menu
      $menu_id = wp_create_nav_menu($menuname);

      // Add the HOME item
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Home', 'charity-foundation'),
          'menu-item-classes' => 'home',
          'menu-item-url'     => home_url('/index.php/home/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the PAGE item
      $parent_page_item_id = wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Pages', 'charity-foundation'),
          'menu-item-classes' => 'page',
          'menu-item-url'     => home_url('/index.php/page/'),
          'menu-item-status'  => 'publish'
      ));

      // Add the Page Left Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Left Sidebar', 'charity-foundation'),
          'menu-item-classes' => 'page-left',
          'menu-item-url'     => home_url('/index.php/page-left/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      // Add the Page Right Sidebar item as a child of PAGE
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'   => __('Page Right Sidebar', 'charity-foundation'),
          'menu-item-classes' => 'page-right',
          'menu-item-url'     => home_url('/index.php/page-right/'),
          'menu-item-status'  => 'publish',
          'menu-item-parent-id' => $parent_page_item_id
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Our Courses', 'charity-foundation'),
          'menu-item-classes' => 'our-courses',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Case Studies', 'charity-foundation'),
          'menu-item-classes' => 'case-studies',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title'  => __('Features', 'charity-foundation'),
          'menu-item-classes' => 'features',
          'menu-item-url'     => '#',
          'menu-item-status'  => 'publish'
      ));
      
      // Assign the menu to the desired location if not already assigned
      if (!has_nav_menu($bpmenulocation)) {
          $locations = get_theme_mod('nav_menu_locations');
          $locations[$bpmenulocation] = $menu_id;
          set_theme_mod('nav_menu_locations', $locations);
      }
    }
       
    // --------Header------------------------

    set_theme_mod('ngo_charity_donation_call_text','Call Us for Enquiry : ');

    set_theme_mod( 'ngo_charity_donation_call_number', '(+91) 1800-1234-1234' ); 

    set_theme_mod( 'ngo_charity_donation_call_icon', 'fas fa-phone-volume' );

    set_theme_mod('ngo_charity_donation_email_text',' Mail Us for Enquiry : ');

    set_theme_mod( 'ngo_charity_donation_email_address', 'support@charity.com' ); 

    set_theme_mod( 'ngo_charity_donation_email_icon', 'fas fa-envelope-open' ); 

    set_theme_mod( 'ngo_charity_donation_donate_btn_link', '#' );

    set_theme_mod( 'ngo_charity_donation_donate_btn_text', 'DONATE NOW' );

    // --------Social icons------------------------

    set_theme_mod( 'ngo_charity_donation_twitter', 'https://twitter.com/' );

    set_theme_mod( 'ngo_charity_donation_linkedin', 'https://linkedin.com/' );

    set_theme_mod( 'ngo_charity_donation_youtube', 'https://youtube.com/' ); 

    set_theme_mod( 'ngo_charity_donation_instagram', 'https://instagram.com/' );

    //-------------- Slider-----------------------

    set_theme_mod('ngo_charity_donation_slider_count','4');

    set_theme_mod( 'ngo_charity_donation_slide_heading', 'GIVE A HAND TO MAKE' );

    for($i=1;$i<=4;$i++){

      $title = 'Help the children. Make big changes and help the world';
      $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.Aster ipsum dolor Tur adipiscing elit, sed do eiusmod. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';

      // Create post object
      $ngo_charity_donation_my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
      );

      $ngo_charity_donation_slider_post_id = wp_insert_post($ngo_charity_donation_my_post);

      $ngo_charity_donation_post_image_url = get_stylesheet_directory_uri().'/assets/images/image.png';

      $ngo_charity_donation_image_name = 'image.png';
      $ngo_charity_donation_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $ngo_charity_donation_image_data       = file_get_contents($ngo_charity_donation_post_image_url); 
       
      // Get image data
      $ngo_charity_donation_unique_file_name = wp_unique_filename( $ngo_charity_donation_upload_dir['path'], $ngo_charity_donation_image_name ); 
      // Generate unique name
      $filename= basename( $ngo_charity_donation_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $ngo_charity_donation_upload_dir['path'] ) ) {
          $file = $ngo_charity_donation_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $ngo_charity_donation_upload_dir['basedir'] . '/' . $filename;
      }
      file_put_contents( $file, $ngo_charity_donation_image_data );
      $wp_filetype = wp_check_filetype( $filename, null );
      $ngo_charity_donation_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_type'     => 'post',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $ngo_charity_donation_attachment, $file, $ngo_charity_donation_slider_post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $ngo_charity_donation_slider_post_id, $attach_id );

      // Set theme mod for each post created
      set_theme_mod('ngo_charity_donation_post_setting' . $i, $ngo_charity_donation_slider_post_id);

    }

    //-------------- Volunteer----------------------

    set_theme_mod( 'ngo_charity_donation_volunteer_title', 'Strategic Priorities Up To 2024 Are' ); 

    set_theme_mod('ngo_charity_donation_volunteer_btn_link','#');

    set_theme_mod( 'ngo_charity_donation_volunteer_btn_text', 'BECOME A VOLUNTEER' ); 

    set_theme_mod('ngo_charity_donation_volunteer_increament','3');

    $ngo_charity_donation_volunteer_icon = array('far fa-handshake','fas fa-house-user','fas fa-people-carry-box');

    $ngo_charity_donation_volunteer_no = array('612+','24+','60k+');

    $ngo_charity_donation_volunteer_title = array('People supported last year','Accommodation and shelter projects','Marginalised People supported daily');

    for($i=1;$i<=3;$i++){

      set_theme_mod( 'ngo_charity_donation_volunteer_box_icon'.$i, $ngo_charity_donation_volunteer_icon[$i-1]);

      set_theme_mod( 'ngo_charity_donation_volunteer_box_number'.$i, $ngo_charity_donation_volunteer_no[$i-1]);

      set_theme_mod( 'ngo_charity_donation_volunteer_box_title'.$i, $ngo_charity_donation_volunteer_title[$i-1]);

    }

    //--------------Causes---------------------

    set_theme_mod('charity_foundation_causes_section_title','Our Causes');

    set_theme_mod('charity_foundation_causes_count','4');

    $charity_foundation_causes_category = wp_create_category('Our Causes'); 

    $charity_foundation_causes_title=array('Food For All Children','Blood Donation Camp','Save Earth','Old Age Home Collection');

    $charity_foundation_raised_value = array('30000','30000','30000','30000');
    $charity_foundation_goal_value = array('50000','50000','50000','50000');

    for($i=1;$i<=4;$i++){

      $title = $charity_foundation_causes_title[$i-1];
      $content = 'Consectetur adipisicing elit, sed deio eiusmod tempor incididunt ut labore et dolore maesgna aliqsdesua. eteesnim adesde minim.';

      // Create post object
      $charity_foundation_my_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($charity_foundation_causes_category),
       'order'         => 'ASC'
      );

      $charity_foundation_causes_post_id = wp_insert_post($charity_foundation_my_post);

        // Set post meta
        update_post_meta($charity_foundation_causes_post_id, 'charity_foundation_raised', $charity_foundation_raised_value[$i-1]);
        update_post_meta($charity_foundation_causes_post_id, 'charity_foundation_goal', $charity_foundation_goal_value[$i-1]);

      $charity_foundation_causes_post_image_url = get_stylesheet_directory_uri().'/assets/images/cause'.$i.'.jpg';

      $charity_foundation_causes_image_name = 'cause'.$i.'.jpg';
      $charity_foundation_causes_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $charity_foundation_causes_image_data       = file_get_contents($charity_foundation_causes_post_image_url); 
       
      // Get image data
      $charity_foundation_causes_unique_file_name = wp_unique_filename( $charity_foundation_causes_upload_dir['path'], $charity_foundation_causes_image_name ); 
      // Generate unique name
      $filename= basename( $charity_foundation_causes_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $charity_foundation_causes_upload_dir['path'] ) ) {
          $file = $charity_foundation_causes_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $charity_foundation_causes_upload_dir['basedir'] . '/' . $filename;
      }
      file_put_contents( $file, $charity_foundation_causes_image_data );
      $wp_filetype = wp_check_filetype( $filename, null );
      $charity_foundation_causes_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_type'     => 'post',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $charity_foundation_causes_attachment, $file, $charity_foundation_causes_post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $charity_foundation_causes_post_id, $attach_id );
    }

    set_theme_mod( 'charity_foundation_causes_section_category', 'Our Causes' );

  } ?>
  
  <p class="plugin-text"><?php echo esc_html_e('Before Demo Import first install given plugin, ','charity-foundation'); ?><span><?php echo esc_html_e('WooCommerce','charity-foundation'); ?></span></p>
  <p class="note"><?php esc_html_e("If your website is already live and containing data, please make a backup.This importer will override the Charity Foundation's new customizable values.",'charity-foundation'); ?></p>
  <form id="mep-demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=ngo-charity-donation-guide-page" method="POST">
    <input type="submit" name="submit" value="<?php echo esc_attr( __('Begin With Demo Import', 'charity-foundation') ); ?>" class="button button-primary button-large">
    <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="button button-primary button-large"><?php esc_html_e('View Site','charity-foundation'); ?></a>
  </form>
  <div class="mep-spinner-div"><p class="spinner"></p></div>
  <div class="success">
    <?php if (isset($_GET['import-demo'])) {
       echo esc_html(__('Demo Import Successful', 'charity-foundation'));
    } ?>
  </div>
  <?php $admin_url = admin_url( 'admin-ajax.php' ); ?>

  <script type="text/javascript">
    function validate() {
      document.forms[0].submit();
    }
    jQuery(document).ready(function($) {
      var pathUrl = new URL(window.location.href)
      var searchParams = pathUrl.searchParams.get("import-demo")
      if(searchParams) {
        history.replaceState({}, '', 'themes.php?page=ngo-charity-donation-guide-page')
      }
      $( "#mep-demo-importer-form" ).submit(function( event ) {
        event.preventDefault();
        if(confirm("Are you sure, you want to import demo content?")){
          $('.spinner').addClass('is-active');
          location.href = location.href + '&import-demo=true';
        } else {
          return false;
        }
      });
    });
  </script>
</div>