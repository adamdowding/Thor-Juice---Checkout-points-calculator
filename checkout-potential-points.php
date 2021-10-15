/*
 * Display point information on checkout or cart pages via shortcode.*/
function checkout_points_calc(){
	$subtotal = WC()->cart->get_subtotal(); //get the subtotal of the current cart
	$points = $subtotal * 10; //multiplies subtotal by 10 to get points (subject to configuration)
	$points = ceil($points); //round up points
	$user_points = do_shortcode('[wr_simple_points]'); //uses the shortcode available in MyRewards to get users points.
	if(!is_user_logged_in() ) { //if they are not logged in
	echo "<p>You could earn {$points} points with this order if you register an account. <a href='/my-account'>Register Now</a></p>"; //echo what they could earn
		}
	else if(is_user_logged_in() ) { // if they are logged in
		echo "<p>You will earn {$points} points with this order!</p>"; //echo what they will earn
		echo "<p>You have {$user_points} points! We'll send you a coupon when you reach 1000.<p>"; //echo what they have
		}
}
add_shortcode('wqpotentialpoints','checkout_points_calc');