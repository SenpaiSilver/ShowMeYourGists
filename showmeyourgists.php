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
function embedGistInPostsBBCode($post) {
	$pat = '/^(?:<p.*>)?\[Gist@\/?(.*\/[A-Z0-9]+)\](?:<\/p>)?$/mi';
	$sub = '<script src="//gist.github.com/$1.js"></script>';
	$post = preg_replace($pat, $sub, $post);
	return ($post);
}

function embedGistsInPosts($post) {
	$pat = '/^<p>(https?:)\/\/gist.github.com\/(.*)\/(.*)<\/p>$/mi';
	$sub = '<script src="$1//gist.github.com/$2/$3.js"><a href="$1//gist.github.com/$2/$3.js">$1//gist.github.com/$2/$3.js</a></script>';
	$post = preg_replace($pat, $sub, $post);
	return ($post);
}

add_action('the_content', 'embedGistsInPosts');
//add_action('the_content', 'embedGistsInPostsBBCode');

?>
