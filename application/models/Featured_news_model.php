<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Featured_news_model extends CI_Model {

	private $table = 'featured_news';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get all featured news articles with ordering
	 */
	public function get_all_featured()
	{
		$this->db->select('fn.*, tn.newtitle, tn.Upload_Image, tn.Description, tn.Category as category_id, ct.name as Category');
		$this->db->from($this->table . ' fn');
		$this->db->join('tbladdnews tn', 'fn.news_id = tn.id', 'inner');
		$this->db->join('tblcategory ct', 'tn.Category = ct.id', 'inner');
		$this->db->where('fn.is_featured', 1);
		$this->db->order_by('fn.order_column', 'ASC');
		
		$query = $this->db->get();
		return $query->result();
	}

	/**
	 * Get a single featured news article by ID
	 */
	public function get_featured_by_id($id)
	{
		$this->db->select('fn.*, tn.newtitle, tn.Upload_Image, tn.Description, tn.Category, tn.create_date');
		$this->db->from($this->table . ' fn');
		$this->db->join('tbladdnews tn', 'fn.news_id = tn.id', 'inner');
		$this->db->where('fn.id', $id);
		
		$query = $this->db->get();
		return $query->row();
	}

	/**
	 * Get featured news by news_id
	 */
	public function get_by_news_id($news_id)
	{
		$this->db->where('news_id', $news_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	/**
	 * Add news to featured
	 */
	public function add_featured($news_id, $order = 0)
	{
		$data = array(
			'news_id' => $news_id,
			'order_column' => $order,
			'is_featured' => 1,
			'featured_date' => date('Y-m-d H:i:s')
		);

		return $this->db->insert($this->table, $data);
	}

	/**
	 * Update featured news order
	 */
	public function update_order($id, $order)
	{
		$data = array(
			'order_column' => $order,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	/**
	 * Update featured status
	 */
	public function update_featured_status($id, $is_featured)
	{
		$data = array(
			'is_featured' => $is_featured,
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	/**
	 * Remove a featured news article
	 */
	public function remove_featured($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	/**
	 * Remove featured status from news by news_id
	 */
	public function remove_featured_by_news_id($news_id)
	{
		$this->db->where('news_id', $news_id);
		return $this->db->delete($this->table);
	}

	/**
	 * Get count of featured articles
	 */
	public function get_featured_count()
	{
		return $this->db->where('is_featured', 1)
			->count_all_results($this->table);
	}

	/**
	 * Reorder featured articles
	 */
	public function reorder($articles)
	{
		foreach ($articles as $order => $id) {
			$data = array('order_column' => $order);
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
		}
		return true;
	}

	/**
	 * Get paginated featured news
	 */
	public function get_featured_paginated($limit, $offset)
	{
		$this->db->select('fn.*, tn.newtitle, tn.Upload_Image, tn.Description, tn.Category');
		$this->db->from($this->table . ' fn');
		$this->db->join('tbladdnews tn', 'fn.news_id = tn.id', 'inner');
		$this->db->where('fn.is_featured', 1);
		$this->db->order_by('fn.order_column', 'ASC');
		$this->db->limit($limit, $offset);
		
		$query = $this->db->get();
		return $query->result();
	}
}
?>
