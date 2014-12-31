<?php
/**
 * @package ShowMeYourGists
 * @version 0.5
 */
/*
Plugin Name: Show Me Your Gists
Plugin URI: https://github.com/SenpaiSilver/ShowMeYourGists
Description: How about embedding esealy Gists ? To do so just paste the Gist link on a single line.
Author: SenpaiSilver
Version: 0.5
Author URI: http://senpaisilver.com/
*/

function embedGistsInPosts($post) {
	$pat = '/<p>(https?:)\/\/gist.github.com\/(.*)\/(.*)<\/p>/mi';
	$sub = '<script src="$1//gist.github.com/$2/$3.js"></script>';
	$post = preg_replace($pat, $sub, $post);
	echo($post);
}

add_action('the_content', 'embedGistsInPosts');

?>
