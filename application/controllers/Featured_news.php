<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Featured_news extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Featured_news_model');
		$this->load->model('Website_model');
	}

	/**
	 * Display all featured news articles
	 */
	public function index()
	{
		$data['featured_articles'] = $this->Featured_news_model->get_all_featured();
		$data['page_title'] = 'Featured News';
		
		$this->load->view('featured_news', $data);
	}

	/**
	 * Get featured news as JSON (useful for AJAX requests)
	 */
	public function get_featured_json()
	{
		$articles = $this->Featured_news_model->get_all_featured();
		header('Content-Type: application/json');
		echo json_encode($articles);
	}

	/**
	 * Get single featured article by ID
	 */
	public function view($id)
	{
		$data['article'] = $this->Featured_news_model->get_featured_by_id($id);
		
		if (!$data['article']) {
			show_404();
		}

		$data['page_title'] = $data['article']->newtitle;
		$this->load->view('featured_news_detail', $data);
	}

	/**
	 * Add a news article to featured (Admin)
	 */
	public function add_featured($news_id, $order = 0)
	{
		if (!is_admin()) {
			return false;
		}

		// Check if already featured
		$existing = $this->Featured_news_model->get_by_news_id($news_id);
		if ($existing) {
			return false;
		}

		return $this->Featured_news_model->add_featured($news_id, $order);
	}

	/**
	 * Update featured order (Admin)
	 */
	public function update_order()
	{
		if (!is_admin()) {
			return false;
		}

		$this->input->is_ajax_request() or exit('No direct access allowed');

		$id = $this->input->post('id');
		$order = $this->input->post('order');

		if ($this->Featured_news_model->update_order($id, $order)) {
			return json_response('success', 'Order updated successfully');
		} else {
			return json_response('error', 'Failed to update order');
		}
	}

	/**
	 * Toggle featured status (Admin)
	 */
	public function toggle_featured()
	{
		if (!is_admin()) {
			return false;
		}

		$this->input->is_ajax_request() or exit('No direct access allowed');

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		if ($this->Featured_news_model->update_featured_status($id, $status)) {
			return json_response('success', 'Featured status updated');
		} else {
			return json_response('error', 'Failed to update featured status');
		}
	}

	/**
	 * Remove featured article (Admin)
	 */
	public function remove($id)
	{
		if (!is_admin()) {
			return false;
		}

		if ($this->Featured_news_model->remove_featured($id)) {
			redirect('admin/featured-news');
		} else {
			show_error('Unable to remove featured article');
		}
	}

	/**
	 * Reorder featured articles (Admin)
	 */
	public function reorder()
	{
		if (!is_admin()) {
			return false;
		}

		$this->input->is_ajax_request() or exit('No direct access allowed');

		$articles = $this->input->post('articles');

		if ($articles && is_array($articles)) {
			$this->Featured_news_model->reorder($articles);
			return json_response('success', 'Articles reordered successfully');
		} else {
			return json_response('error', 'Invalid data provided');
		}
	}

	/**
	 * Get featured count
	 */
	public function get_count()
	{
		$count = $this->Featured_news_model->get_featured_count();
		header('Content-Type: application/json');
		echo json_encode(array('count' => $count));
	}
}
?>
