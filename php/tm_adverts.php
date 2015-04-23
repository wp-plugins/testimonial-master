<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Generates The Advertisements. Please do not delete this unless purchasing the Advertisements Be Gone addon in our store to help fund further development of this plugin.
 *
 * @since 0.2.0
 */
function tm_adverts()
{
  wp_enqueue_style( 'tm_admin_style', plugins_url( '../css/admin.css' , __FILE__ ) );
	$mlw_advert = "";
	$mlw_advert_text = "";
	if ( get_option('mlw_advert_shows') == 'true' )
	{
		$mlw_random_int = rand(0, 4);
		switch ($mlw_random_int) {
			case 0:
				$mlw_advert_text = "Need support or features? Check out our Premium Support options! Visit our <a class='adverts_link' href=\"http://mylocalwebstop.com/store/\">WordPress Store</a> for details!";
				break;
			case 1:
				$mlw_advert_text = "Is Testimonial Master beneficial to your website? Please help by giving us a review on WordPress.org by going <a class='adverts_link' href=\"http://wordpress.org/support/view/plugin-reviews/testimonial-master\">here</a>!";
				break;
			case 2:
				$mlw_advert_text = "Would you like to support this plugin but do not need or want premium support? Please consider our inexpensive 'Advertisements Be Gone' add-on which will get rid of these ads. Visit our <a class='adverts_link' href=\"http://mylocalwebstop.com/store/\">WordPress Store</a> for details!";
				break;
			case 3:
				$mlw_advert_text = "Need help keeping your plugins, themes, and WordPress up to date? Want around the clock security monitoring and off-site back-ups? How about WordPress training videos, a monthly status report, and support/consultation? Check out our <a class='adverts_link' href=\"http://mylocalwebstop.com/downloads/wordpress-maintenance/\">WordPress Maintenance Services</a> for more details!";
				break;
			case 4:
				$mlw_advert_text = "Setting up a new site? Let us take care of the set-up so you back to running your business. Check out our <a class='adverts_link' href=\"http://mylocalwebstop.com/downloads/new-wordpress-installation/\">WordPress Installation Services</a> for more details!";
				break;
			default:
				$mlw_advert_text = "Need support or features? Check out our Premium Support options! Visit our <a class='adverts_link' href=\"http://mylocalwebstop.com/store/\">WordPress Store</a> for details!";
		}
		$mlw_advert .= "
			<div class='adverts'>
			<p>$mlw_advert_text</p>
			</div>";
	}
	return $mlw_advert;
}
?>
