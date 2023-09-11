<?php

/**
 * Template for displaying search forms
 *
 * @package  pollix
 * @since    1.0
 */
?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
    <input type="text" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'gotox' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
   	<button type="submit" class="search-submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.7991 16.7545C17.933 16.9018 18 17.0759 18 17.2768C18 17.4777 17.933 17.6518 17.7991 17.7991C17.6518 17.933 17.4777 18 17.2768 18C17.0759 18 16.9085 17.933 16.7746 17.7991L12.6362 13.6607C11.2031 14.8393 9.56251 15.4286 7.71429 15.4286C5.58481 15.4286 3.76675 14.6752 2.26004 13.1685C0.753341 11.6618 0 9.84376 0 7.71429C0 5.58481 0.753341 3.76675 2.26004 2.26004C3.76675 0.753341 5.58481 0 7.71429 0C9.84376 0 11.6618 0.753341 13.1685 2.26004C14.6752 3.76675 15.4286 5.58481 15.4286 7.71429C15.4286 9.56251 14.8393 11.2031 13.6607 12.6362L17.7991 16.7545ZM10.1451 13.5C10.8951 13.1786 11.5614 12.7266 12.144 12.144C12.7266 11.5614 13.1786 10.8951 13.5 10.1451C13.8214 9.38169 13.9821 8.57143 13.9821 7.71429C13.9821 6.85714 13.8214 6.04688 13.5 5.28348C13.1786 4.53348 12.7266 3.86719 12.144 3.2846C11.5614 2.70201 10.8951 2.25 10.1451 1.92857C9.38169 1.60714 8.57143 1.44643 7.71429 1.44643C6.85714 1.44643 6.04688 1.60714 5.28348 1.92857C4.53348 2.25 3.86719 2.70201 3.2846 3.2846C2.70201 3.86719 2.2567 4.53348 1.94866 5.28348C1.61384 6.04688 1.44643 6.85714 1.44643 7.71429C1.44643 8.57143 1.61384 9.38169 1.94866 10.1451C2.2567 10.8951 2.70201 11.5614 3.2846 12.144C3.86719 12.7266 4.53348 13.1786 5.28348 13.5C6.04688 13.8214 6.85714 13.9821 7.71429 13.9821C8.57143 13.9821 9.38169 13.8214 10.1451 13.5Z" fill="black"/>
        </svg>
	</button>
</form>
