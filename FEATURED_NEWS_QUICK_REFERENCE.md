# Featured News System - Quick Reference Card

## 🎯 Access Admin Panel
```
URL: http://yourdomain.com/admin/featured_news
Requires: Admin login
```

## 🔧 Helper Functions Cheat Sheet

```php
// Check if article is featured
is_article_featured($news_id)

// Get featured badge HTML
get_featured_badge(true)  // Returns HTML badge

// Get featured toggle button
get_featured_toggle_button($news_id)  // Returns HTML button

// Get count of featured articles
$count = get_featured_count()

// Get all featured articles
$articles = get_all_featured_articles()
$articles = get_all_featured_articles(5)  // Get top 5

// Get specific featured article
$article = get_featured_article_by_id($id)
```

## 📱 Model Methods Cheat Sheet

```php
// Load model
$this->load->model('Featured_news_model');

// Get all featured
$articles = $this->Featured_news_model->get_all_featured();

// Get by ID
$article = $this->Featured_news_model->get_featured_by_id($id);

// Check if featured
$featured = $this->Featured_news_model->get_by_news_id($news_id);

// Add to featured
$this->Featured_news_model->add_featured($news_id, $order);

// Update order
$this->Featured_news_model->update_order($id, $order);

// Toggle status
$this->Featured_news_model->update_featured_status($id, $is_featured);

// Remove
$this->Featured_news_model->remove_featured($id);

// Count
$count = $this->Featured_news_model->get_featured_count();

// Reorder multiple
$this->Featured_news_model->reorder($articles_array);

// Paginated
$articles = $this->Featured_news_model->get_featured_paginated($limit, $offset);
```

## 🎨 Display Featured Articles

### Simple Usage
```php
<?php
// In your controller
$data['featured'] = get_all_featured_articles(4);
$this->load->view('home', $data);

// In your view
include(APPPATH . 'views/featured_news_display.php');
?>
```

### Manual Loop
```php
<?php
$featured = get_all_featured_articles(4);
foreach($featured as $article):
?>
    <div class="featured-item">
        <h3><?php echo $article->newtitle;?></h3>
        <img src="<?php echo base_url('assets/images/blog/'.$article->Upload_Image);?>" 
             alt="<?php echo $article->newtitle;?>">
        <a href="<?php echo site_url('post/'.$article->news_id);?>">Read More</a>
    </div>
<?php endforeach;?>
```

## 🔐 Admin Features

| Feature | Action | Button |
|---------|--------|--------|
| Add to Featured | Dropdown + Click "Add" | Primary |
| Reorder | Drag by "≡" handle | Drag-drop |
| Save Order | Click "Save Order" | Success |
| Toggle Status | Click Active/Inactive | Info/Warning |
| Remove | Click "Remove" | Danger |

## 📊 Database Columns

| Column | Type | Purpose |
|--------|------|---------|
| id | INTEGER | Primary Key |
| news_id | INTEGER | Article ID (FK) |
| order_column | INTEGER | Display order |
| is_featured | BOOLEAN | Status (1/0) |
| featured_date | TIMESTAMP | When featured |
| created_at | TIMESTAMP | Creation time |
| updated_at | TIMESTAMP | Last update |

## 🛣️ Routes

```
GET  /admin/featured_news                    Dashboard
POST /admin/featured_news/add_featured_ajax  Add article (AJAX)
POST /admin/featured_news/update_order_ajax  Save order (AJAX)
POST /admin/featured_news/toggle_featured_ajax  Toggle status (AJAX)
GET  /admin/featured_news/remove/{id}        Remove article
GET  /admin/featured_news/quick_toggle/{id}  Quick toggle
GET  /admin/featured_news/get_count           Get count (AJAX)
```

## 💾 Sample Data

Pre-loaded with 4 articles:
1. Austria 2025 Clinics (Order: 1)
2. Newcastle Isak (Order: 2)
3. Nigeria Travel (Order: 3)
4. Music Festivals (Order: 4)

All modifiable/deletable from admin panel.

## 🎯 Integration Steps

### Step 1: Load Helper (if not auto-loaded)
```php
$this->load->helper('featured_news');
```

### Step 2: Get Featured Articles
```php
$featured = get_all_featured_articles(4);
```

### Step 3: Pass to View
```php
$data['featured_articles'] = $featured;
$this->load->view('home', $data);
```

### Step 4: Display in View
```php
<?php if($featured_articles):?>
    <?php include(APPPATH . 'views/featured_news_display.php');?>
<?php endif;?>
```

## 📄 Files Created

| File | Purpose | Size |
|------|---------|------|
| Featured_news_model.php | Data operations | 3.4 KB |
| admin/Featured_news.php | Admin controller | 4.8 KB |
| Featured_news.php | Public controller | 3.4 KB |
| admin/featured_news.php | Admin interface | 16.6 KB |
| featured_news_display.php | Public display | 3.5 KB |
| featured_news_helper.php | Helper functions | 2.1 KB |
| create_featured_news_table.sql | Database | - |

## ⚡ Quick Tips

- **Auto-loaded**: Helper functions available everywhere
- **Drag-drop**: Uses jQuery UI Sortable
- **AJAX**: No page reloads for operations
- **Responsive**: Works on mobile/tablet/desktop
- **Cached**: Can be cached for performance
- **Indexed**: Database optimized with indexes

## 🐛 Troubleshooting

### Articles not showing?
- Check `tbladdnews` table has articles
- Verify articles aren't already featured

### Drag-drop not working?
- Check jQuery UI is loaded
- Verify browser console for errors

### AJAX failing?
- Check browser console
- Verify admin is logged in
- Check route URLs

## 📞 Documentation Links

- **Full Docs**: `FEATURED_NEWS_README.md`
- **Quick Start**: `FEATURED_NEWS_QUICKSTART.md`
- **Summary**: `FEATURED_NEWS_IMPLEMENTATION_SUMMARY.md`

---

**Version**: 1.0  
**Created**: November 13, 2025  
**Framework**: CodeIgniter 3.x  
**Database**: SQLite3
