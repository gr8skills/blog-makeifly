-- Create featured_news table
CREATE TABLE IF NOT EXISTS featured_news (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    news_id INTEGER NOT NULL,
    order_column INTEGER DEFAULT 0,
    is_featured BOOLEAN DEFAULT 1,
    featured_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (news_id) REFERENCES tbladdnews(id) ON DELETE CASCADE
);

-- Create index for better query performance
CREATE INDEX IF NOT EXISTS idx_featured_news_order ON featured_news(order_column);
CREATE INDEX IF NOT EXISTS idx_featured_news_id ON featured_news(news_id);
