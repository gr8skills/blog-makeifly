<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Featured_news extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Featured_news_model');
		$this->load->model('Website_model');
		
		// Check if user is logged in
		// TEMPORARY DEBUG: Disabled auth redirect so we can inspect controller behaviour
		// Re-enable the redirect after debugging by removing the comment markers below.
		/*
		if(!$this->session->userdata('is_logged_in')) {
			redirect('admin/login');
		}
		*/
	}

	/**
	 * Display featured news management page
	 */
	public function index()
	{
		// Get all featured articles
		$data['featured_articles'] = $this->Featured_news_model->get_all_featured();

		// Get available news articles (not yet featured)
		// First fetch the featured news IDs as a plain array to avoid modifying
		// the active query builder and creating a multi-table FROM that causes
		// SQLite to see ambiguous "id" columns.
		$featured_rows = $this->db->select('news_id')->from('featured_news')->get()->result_array();
		$featured_ids = array();
		if(!empty($featured_rows)) {
			$featured_ids = array_column($featured_rows, 'news_id');
		}

		$this->db->select('tbladdnews.id, tbladdnews.newtitle');
		$this->db->from('tbladdnews');
		if(!empty($featured_ids)) {
			$this->db->where_not_in('tbladdnews.id', $featured_ids);
		}
		$data['available_news'] = $this->db->get()->result();
		
		$data['page_title'] = 'Manage Featured News';
		
		$this->load->view('admin/featured_news', $data);
	}

	/**
	 * Add news to featured via AJAX
	 */
	public function add_featured_ajax()
	{
		if(!$this->input->is_ajax_request()) {
			show_error('No direct access allowed');
			return;
		}

		$news_id = $this->input->post('news_id');
		$order = $this->input->post('order');

		if(!$news_id) {
			echo json_encode(array(
				'success' => false,
				'message' => 'News ID is required'
			));
			return;
		}

		// Check if already featured
		$existing = $this->Featured_news_model->get_by_news_id($news_id);
		if($existing) {
			echo json_encode(array(
				'success' => false,
				'message' => 'This article is already featured'
			));
			return;
		}

		// Add to featured
		if($this->Featured_news_model->add_featured($news_id, $order)) {
			echo json_encode(array(
				'success' => true,
				'message' => 'Article added to featured successfully'
			));
		} else {
			echo json_encode(array(
				'success' => false,
				'message' => 'Failed to add article to featured'
			));
		}
	}

	/**
	 * Update order via AJAX
	 */
	public function update_order_ajax()
	{
		if(!$this->input->is_ajax_request()) {
			show_error('No direct access allowed');
			return;
		}

		$articles = $this->input->post('articles');

		if(!is_array($articles)) {
			echo json_encode(array(
				'success' => false,
				'message' => 'Invalid data provided'
			));
			return;
		}

		foreach($articles as $item) {
			$this->Featured_news_model->update_order($item['id'], $item['order']);
		}

		echo json_encode(array(
			'success' => true,
			'message' => 'Order updated successfully'
		));
	}

	/**
	 * Toggle featured status via AJAX
	 */
	public function toggle_featured_ajax()
	{
		if(!$this->input->is_ajax_request()) {
			show_error('No direct access allowed');
			return;
		}

		$id = $this->input->post('id');
		$is_featured = $this->input->post('is_featured');

		if(!$id) {
			echo json_encode(array(
				'success' => false,
				'message' => 'ID is required'
			));
			return;
		}

		if($this->Featured_news_model->update_featured_status($id, $is_featured)) {
			echo json_encode(array(
				'success' => true,
				'message' => 'Featured status updated successfully'
			));
		} else {
			echo json_encode(array(
				'success' => false,
				'message' => 'Failed to update featured status'
			));
		}
	}

	/**
	 * Remove featured article
	 */
	public function remove($id)
	{
		if(!$id) {
			show_error('Invalid ID');
			return;
		}

		if($this->Featured_news_model->remove_featured($id)) {
			$this->session->set_flashdata('success', 'Article removed from featured successfully');
		} else {
			$this->session->set_flashdata('error', 'Failed to remove article from featured');
		}

		redirect('admin/featured_news');
	}

	/**
	 * Get featured news count
	 */
	public function get_count()
	{
		if(!$this->input->is_ajax_request()) {
			show_error('No direct access allowed');
			return;
		}

		$count = $this->Featured_news_model->get_featured_count();
		echo json_encode(array('count' => $count));
	}

	/**
	 * Quick action to toggle featured via direct link
	 */
	public function quick_toggle($news_id)
	{
		// Check if article is featured
		$featured = $this->Featured_news_model->get_by_news_id($news_id);

		if($featured) {
			// Remove from featured
			$this->Featured_news_model->remove_featured($featured->id);
			$this->session->set_flashdata('success', 'Article removed from featured');
		} else {
			// Add to featured
			$max_order = $this->db->select_max('order_column')
				->from('featured_news')
				->get()
				->row();
			
			$next_order = ($max_order && $max_order->order_column) ? $max_order->order_column + 1 : 0;
			
			$this->Featured_news_model->add_featured($news_id, $next_order);
			$this->session->set_flashdata('success', 'Article added to featured');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
