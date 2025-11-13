<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Featured News Helper Functions
 */

/**
 * Check if a news article is featured
 */
if (!function_exists('is_article_featured')) {
	function is_article_featured($news_id)
	{
		$CI = &get_instance();
		$CI->load->model('Featured_news_model');
		
		$featured = $CI->Featured_news_model->get_by_news_id($news_id);
		return !empty($featured);
	}
}

/**
 * Get featured article badge HTML
 */
if (!function_exists('get_featured_badge')) {
	function get_featured_badge($is_featured = true)
	{
		if($is_featured) {
			return '<span class="badge badge-success"><i class="icon-star"></i> Featured</span>';
		} else {
			return '';
		}
	}
}

/**
 * Get featured toggle button
 */
if (!function_exists('get_featured_toggle_button')) {
	function get_featured_toggle_button($news_id)
	{
		$CI = &get_instance();
		$CI->load->model('Featured_news_model');
		
		$featured = $CI->Featured_news_model->get_by_news_id($news_id);
		$base_url = base_url('admin/featured_news/quick_toggle/');
		
		if($featured) {
			return '<a href="' . $base_url . $news_id . '" class="btn btn-sm btn-warning" title="Remove from featured">
					<i class="icon-star"></i> Remove Featured
				</a>';
		} else {
			return '<a href="' . $base_url . $news_id . '" class="btn btn-sm btn-info" title="Add to featured">
					<i class="icon-star"></i> Add to Featured
				</a>';
		}
	}
}

/**
 * Get featured article count
 */
if (!function_exists('get_featured_count')) {
	function get_featured_count()
	{
		$CI = &get_instance();
		$CI->load->model('Featured_news_model');
		
		return $CI->Featured_news_model->get_featured_count();
	}
}

/**
 * Get all featured articles
 */
if (!function_exists('get_all_featured_articles')) {
	function get_all_featured_articles($limit = null)
	{
		$CI = &get_instance();
		$CI->load->model('Featured_news_model');
		
		$articles = $CI->Featured_news_model->get_all_featured();
		
		if($limit && count($articles) > $limit) {
			return array_slice($articles, 0, $limit);
		}
		
		return $articles;
	}
}

/**
 * Get featured article by ID
 */
if (!function_exists('get_featured_article_by_id')) {
	function get_featured_article_by_id($id)
	{
		$CI = &get_instance();
		$CI->load->model('Featured_news_model');
		
		return $CI->Featured_news_model->get_featured_by_id($id);
	}
}
?>
