<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Creator
 */

get_header(); ?>

<div class = "flex-container">
	<div class="container">
		<img src = "http://via.placeholder.com/250x150">
		<p>1 in 5 Residents</p>
		<div class="overlay">
			<div class = "text">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus turpis purus, blandit iaculis elit iaculis utNullam commodo.
			</div>
			<i class="fas fa-times"></i>
		</div>
	</div>	



	<div class="container">	
		<img src = "http://via.placeholder.com/250x150">
		<p>Lose The Loans</p>
		<div class="overlay">
			<div class = "text">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus turpis purus, blandit iaculis elit iaculis utNullam commodo.
			</div>
			<i class="fas fa-times"></i>
		</div>
	</div>	

	<div class="container">	
		<img src = "http://via.placeholder.com/250x150">
		<p>Why TeamHealth?</p>
		<div class="overlay">
			<div class = "text">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus turpis purus, blandit iaculis elit iaculis utNullam commodo.
			</div>
			<i class="fas fa-times"></i>
		</div>
	</div>	

	<div class="container">	
		<img src = "http://via.placeholder.com/250x150">
		<p>More Practice, More Pay</p>
		<div class="overlay">
			<div class = "text">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer finibus turpis purus, blandit iaculis elit iaculis utNullam commodo.
			</div>
			<i class="fas fa-times"></i>
		</div>
	</div>	
</div>

<?php 
get_footer(); ?>