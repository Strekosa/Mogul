<?php

// Check value exists.
if( have_rows('flexible_content') ):

    // Loop through rows.
    while ( have_rows('flexible_content') ) : the_row();

        // Case: Spacer layout.
       if( get_row_layout() == 'spacer' ):
            get_template_part('template-parts/block/spacer/block');
        // Do something...

        // Case: Blog Posts layout.
        elseif( get_row_layout() == 'top_banner' ):
            get_template_part('template-parts/block/top-banner/block');
        // Do something...

        // Case: Service layout.
        elseif( get_row_layout() == 'text' ):
            get_template_part('template-parts/block/text/block');
            // Do something...

        // Case: Team layout.
        elseif( get_row_layout() == 'image_block' ):
            get_template_part('template-parts/block/image-block/block');
            // Do something...

		// Case: Team layout.
		elseif( get_row_layout() == 'reviews' ):
			get_template_part('template-parts/block/reviews/block');
		// Do something...


		// Case: Team layout.
		elseif( get_row_layout() == 'form' ):
			get_template_part('template-parts/block/form/block');
			// Do something...


        endif;

        // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;


