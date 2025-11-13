# Featured News System Documentation

## Overview
The Featured News system allows admins to manage and display featured articles on the blog. Articles can be ordered, activated/deactivated, and easily managed through an intuitive admin interface.

## Features
- ✅ Drag-and-drop reordering of featured articles
- ✅ Add/remove articles from featured list
- ✅ Activate/deactivate featured status
- ✅ Database support with SQLite3
- ✅ AJAX-powered management interface
- ✅ Helper functions for easy integration

## Database Structure

### Table: featured_news
```sql
CREATE TABLE featured_news (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    news_id INTEGER NOT NULL,
    order_column INTEGER DEFAULT 0,
    is_featured BOOLEAN DEFAULT 1,
    featured_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (news_id) REFERENCES tbladdnews(id) ON DELETE CASCADE
);
```

## File Structure

```
application/
├── controllers/
│   ├── admin/
│   │   └── Featured_news.php      # Admin controller
│   └── Featured_news.php           # Public controller
├── models/
│   └── Featured_news_model.php     # Data model
├── views/
│   └── admin/
│       └── featured_news.php       # Admin management view
└── helpers/
    └── featured_news_helper.php    # Helper functions
```

## Usage

### 1. Access Admin Panel
Navigate to: `http://yourdomain.com/admin/featured_news`

### 2. Add Article to Featured
1. Select an article from the dropdown
2. (Optional) Set custom order
3. Click "Add" button

### 3. Reorder Articles
1. Drag articles using the "≡" handle
2. Click "Save Order" to persist changes

### 4. Remove from Featured
Click the "Remove" button on any featured article

### 5. Toggle Status
Click "Active/Inactive" to toggle featured status without removing

## Model Methods

### Featured_news_model

#### Get Methods
```php
// Get all featured articles with details
$articles = $this->Featured_news_model->get_all_featured();

// Get single featured article by ID
$article = $this->Featured_news_model->get_featured_by_id($id);

// Get featured article by news_id
$featured = $this->Featured_news_model->get_by_news_id($news_id);

// Get featured count
$count = $this->Featured_news_model->get_featured_count();

// Get paginated results
$articles = $this->Featured_news_model->get_featured_paginated($limit, $offset);
```

#### Create/Update Methods
```php
// Add article to featured
$this->Featured_news_model->add_featured($news_id, $order);

// Update order
$this->Featured_news_model->update_order($id, $order);

// Update featured status
$this->Featured_news_model->update_featured_status($id, $is_featured);

// Reorder multiple articles
$this->Featured_news_model->reorder($articles_array);
```

#### Delete Methods
```php
// Remove featured article
$this->Featured_news_model->remove_featured($id);

// Remove featured by news_id
$this->Featured_news_model->remove_featured_by_news_id($news_id);
```

## Helper Functions

### Featured News Helper

```php
// Check if article is featured
if(is_article_featured($news_id)) {
    // Do something
}

// Get featured badge HTML
echo get_featured_badge(true); // Shows "Featured" badge

// Get featured toggle button
echo get_featured_toggle_button($news_id);

// Get featured count
$count = get_featured_count();

// Get all featured articles
$articles = get_all_featured_articles($limit = null);

// Get specific featured article
$article = get_featured_article_by_id($id);
```

## Controller Methods

### Admin Controller: /admin/featured_news

#### Routes
```
GET  /admin/featured_news                          - Display management page
POST /admin/featured_news/add_featured_ajax        - Add article to featured
POST /admin/featured_news/update_order_ajax        - Update order
POST /admin/featured_news/toggle_featured_ajax     - Toggle featured status
GET  /admin/featured_news/remove/{id}              - Remove featured article
GET  /admin/featured_news/quick_toggle/{news_id}   - Quick toggle from other pages
```

## Integration Examples

### Display Featured Articles in View
```php
// In your view file
<?php
$featured = get_all_featured_articles(5); // Get top 5 featured
if($featured):
?>
    <section class="featured-articles">
        <h2>Featured Articles</h2>
        <div class="featured-grid">
            <?php foreach($featured as $article):?>
                <div class="featured-item">
                    <img src="<?php echo base_url('assets/images/blog/'.$article->Upload_Image);?>" 
                         alt="<?php echo $article->newtitle;?>">
                    <h3><?php echo $article->newtitle;?></h3>
                    <p><?php echo substr($article->Description, 0, 100);?>...</p>
                    <a href="<?php echo site_url('post/'.$article->news_id);?>" class="btn">Read More</a>
                </div>
            <?php endforeach;?>
        </div>
    </section>
<?php endif;?>
```

### Show Featured Badge in Post List
```php
<?php foreach($posts as $post):?>
    <tr>
        <td><?php echo $post->newtitle;?></td>
        <td>
            <?php 
                if(is_article_featured($post->id)) {
                    echo get_featured_badge(true);
                }
            ?>
        </td>
        <td>
            <?php echo get_featured_toggle_button($post->id);?>
        </td>
    </tr>
<?php endforeach;?>
```

### Add Featured Toggle in News Management
```php
// In manage-post.php or similar
<a href="<?php echo site_url('admin/featured_news/quick_toggle/'.$row->id);?>" 
   class="btn btn-sm btn-info">
   <i class="icon-star"></i> Featured
</a>
```

## API Responses

All AJAX endpoints return JSON responses:

### Success Response
```json
{
    "success": true,
    "message": "Operation completed successfully"
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error description"
}
```

## Sample Data

The system comes with 4 sample featured articles:
- Best Clinics and Costs in Austria 2025
- Newcastle do not foresee Isak leaving the club
- A Guide to Road Travel by Night in Nigeria
- Music festivals and tours in the US

These can be modified or deleted from the admin panel.

## Security Considerations

1. **Admin Authentication**: All admin pages require login
2. **AJAX Protection**: AJAX endpoints verify request origin
3. **Database**: Uses parameterized queries to prevent SQL injection
4. **File Uploads**: Images should be validated (not covered in this module)

## Troubleshooting

### Articles not showing in dropdown
- Check that articles exist in `tbladdnews`
- Ensure they're not already featured

### Drag-and-drop not working
- Check jQuery UI library is loaded
- Verify sortable initialization in JavaScript

### AJAX calls failing
- Check browser console for errors
- Verify routes are correct
- Ensure `$_SERVER['REQUEST_METHOD']` is POST

## Performance Optimization

For sites with many articles:
```php
// Use pagination
$articles = $this->Featured_news_model->get_featured_paginated(10, 0);

// Cache featured articles
$this->load->driver('cache', array('adapter' => 'apc'));
$featured = $this->cache->get('featured_articles');
if (!$featured) {
    $featured = $this->Featured_news_model->get_all_featured();
    $this->cache->save('featured_articles', $featured, 3600); // 1 hour cache
}
```

## Future Enhancements

- [ ] Add featured articles to homepage
- [ ] Create widget for displaying featured articles
- [ ] Add featured articles REST API
- [ ] Bulk operations (select multiple)
- [ ] Schedule featured articles (set start/end dates)
- [ ] Featured article analytics/tracking

---

**Version**: 1.0  
**Last Updated**: November 13, 2025  
**Author**: Development Team
