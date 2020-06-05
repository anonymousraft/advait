<?php
/**
 * Trigger this file on unistall
 *
 * @package Advait
 */

if( !defined('WP_UNINSTALL_PLUGIN') ){
  die;
}

//clear plugin data from the database
//clearing the custom post residue from the database
//method 1
// $books = get_posts( array('post_type' => 'books', 'numberposts' => -1 ) );
//
// foreach( $books as $book){
//   wp_delete_post( $book->ID, true );
// }

//using SQL query (wpdb)

global $wpdb;

$query = "DELETE FROM wp_posts WHERE post_type = 'books'";
$wpdb -> query($query);
//To delete the custom meta box data

$wpdb->query(" DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT id from wp_posts ) ");
//delete taxononoy
$wpdb->query(" DELETE FROM wp_term_relationship WHERE object_id NOT IN ( SELECT id from wp_posts ) ");
