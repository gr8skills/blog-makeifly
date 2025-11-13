<?php
// Featured News Display View
// This can be included in your homepage or any page where you want to show featured articles
?>

<?php if(isset($featured_articles) && count($featured_articles) > 0):?>
<section class="featured-news-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-title">
                    <i class="icon-star"></i> Featured Articles
                </h2>
            </div>
        </div>
        
        <div class="row featured-articles-grid">
            <?php foreach($featured_articles as $article):?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="featured-article-card">
                        <div class="card-image">
                       <?php if(!empty($article->Upload_Image)):?>
                          <!-- Use actual upload path (uploads/files) instead of assets/images/blog to avoid 404s -->
                          <img src="<?php echo base_url('uploads/files/'. $article->Upload_Image);?>" 
                              alt="<?php echo $article->newtitle;?>"
                              class="img-fluid"
                              onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/avatar-1.png');?>'">
                            <?php else:?>
                          <!-- fallback to an existing image to avoid repeated onerror calls -->
                          <img src="<?php echo base_url('assets/images/avatar-1.png');?>" 
                              alt="No image" 
                              class="img-fluid">
                            <?php endif;?>
                            <div class="featured-badge">
                                <i class="icon-star"></i> Featured
                            </div>
                        </div>
                        
                        <div class="card-content">
                            <h3 class="card-title">
                                <a href="<?php echo site_url('post/'.$article->news_id);?>">
                                    <?php echo truncate_text($article->newtitle, 60);?>
                                </a>
                            </h3>
                            
                            <p class="card-category">
                                <small><?php echo $article->Category;?></small>
                            </p>
                            
                            <p class="card-description">
                                <?php echo truncate_text(strip_tags($article->Description), 100);?>
                            </p>
                            
                            <p class="card-date">
                                <small><i class="icon-calendar"></i> <?php echo date('M d, Y', strtotime($article->featured_date));?></small>
                            </p>
                            
                            <a href="<?php echo site_url('post/'.$article->news_id);?>" class="btn btn-primary btn-sm">
                                Read More <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<style>
.featured-news-section {
    padding: 40px 0;
    background: #f9f9f9;
    margin: 30px 0;
}

.featured-news-section .section-title {
    text-align: center;
    font-size: 28px;
    margin-bottom: 40px;
    color: #333;
}

.featured-articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.featured-article-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.featured-article-card:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
    transform: translateY(-5px);
}

.featured-article-card .card-image {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.featured-article-card .card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-article-card:hover .card-image img {
    transform: scale(1.05);
}

.featured-article-card .featured-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a52);
    color: white;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 5px;
}

.featured-article-card .card-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.featured-article-card .card-title {
    font-size: 16px;
    margin-bottom: 10px;
    line-height: 1.4;
}

.featured-article-card .card-title a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-article-card .card-title a:hover {
    color: #ff6b6b;
}

.featured-article-card .card-category {
    color: #999;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.featured-article-card .card-description {
    color: #666;
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 15px;
    flex: 1;
}

.featured-article-card .card-date {
    color: #999;
    margin-bottom: 15px;
    font-size: 12px;
}

.featured-article-card .btn {
    align-self: flex-start;
}

@media (max-width: 768px) {
    .featured-articles-grid {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .featured-news-section .section-title {
        font-size: 22px;
        margin-bottom: 25px;
    }
}

@media (max-width: 480px) {
    .featured-articles-grid {
        grid-template-columns: 1fr;
    }
    
    .featured-news-section {
        padding: 20px 0;
        margin: 15px 0;
    }
}
</style>
