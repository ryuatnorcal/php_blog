/*VARIABLES*/
var base_url = 'http://ryu.keepskatinbro.com';

/*FUNCTIONS*/
function scroll_to($target, duration, top_margin, callback) { //scrolls the page to the $target. $target can be a jQuery object or the number of pixels to scroll from the top.
	if ($target instanceof $ || $target instanceof jQuery) {
		$('html, body').animate({
			scrollTop: $target.offset().top - top_margin
		}, duration, function() {
			if (callback) { callback(); }
		});
	}
	//three ways to check for an integer:
	else if ($target === parseInt($target,10)) { //else if integer
	//else if ( (typeof($target) == 'number') && ($target.toString().indexOf('.') == -1) ) { //else if integer
	//else if ( !isNaN(parseInt($target)) ) { //else if integer
		$('html, body').animate({
			scrollTop: $target
		}, duration, function() {
			if (callback) { callback(); }
		});
	}
	setTimeout( function(){ // FIXME: Why in the heck do I need this to prevent scrollTop from continuing excessively???
		$('html, body').stop(false, true)
	}, duration ); // This hack fixes the issue where the scroll_to function takes way more time than needed (twice as much?). This forces the queue to continue after the desired duration.
}



/*************************************************************************
 * MENU BAR                                                              *
 ************************************************************************/                   

function menu()
{
	var main_menu = getMenu();
	document.write(main_menu);
}

function getMenu()
{
	return "<table>\
					<tr> \
					<td><a href=\"index.html\" title=\"Home\">|| Home</a></td>\
					<td><a href=\"about.html\" title=\"About\">|| About</a></td>\
					<td><a href=\"blog.html\" title=\"WebLog\">|| WebLog</a></td>\
					<td><a href=\"video.html\" title=\"Video\">|| Video</a></td>\
					<td><a href=\"photo.html\" title=\"Photo\">|| Photo</a></td>\
					<td><a href=\"graphics.html\" title=\"Graphics\">|| Graphics</a></td>\
					<td><a href=\"program.html\" title=\"Programming\">|| Programming</a></td>\
					<td><a href=\"special.html\" title=\"Special\">|| Special thanks</a></td>\
					<td><a href=\"contact.html\" title=\"Contact to me\">|| Contact</a></td>\
				</tr>\
			</table>";
}

/*************************************************************************
 * SIDE BAR                                                              *
 ************************************************************************/

function side()
{
	var colum = "Submenu";
	var subMenu = getSubMenu();
	
	document.write("<br /><h4>" + colum + "</h4><br />");
	document.write(subMenu);
}

function getSubMenu()
{
	return "<font size='2'>here will be sub menu </font>";
}










var $comment_link = $('#comment_link');
$comment_link.live('click', function() {
	$('#rightColum_wrapper').load(base_url+'/contents/blog/blog.php?id=comment&comID=1307231481&page=0 .rightColum', function() {
		scroll_to( $('a[href="/contents/blog/blog.php?id=comment&comID=1307231481&page=0"]'), 1500, 20);
	});
	return false;
});
