-- Users table
CREATE TABLE users (
                       id SERIAL PRIMARY KEY,
                       username VARCHAR(50) UNIQUE NOT NULL,
                       email VARCHAR(100) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       first_name VARCHAR(50),
                       last_name VARCHAR(50),
                       avatar VARCHAR(255),
                       role VARCHAR(20) DEFAULT 'user',
                       is_active BOOLEAN DEFAULT true,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Categories table
CREATE TABLE categories (
                            id SERIAL PRIMARY KEY,
                            name VARCHAR(100) UNIQUE NOT NULL,
                            slug VARCHAR(100) UNIQUE NOT NULL,
                            description TEXT,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Posts table
CREATE TABLE posts (
                       id SERIAL PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       slug VARCHAR(255) UNIQUE NOT NULL,
                       content TEXT NOT NULL,
                       excerpt TEXT,
                       featured_image VARCHAR(255),
                       status VARCHAR(20) DEFAULT 'draft',
                       author_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
                       category_id INTEGER REFERENCES categories(id) ON DELETE SET NULL,
                       views_count INTEGER DEFAULT 0,
                       likes_count INTEGER DEFAULT 0,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tags table
CREATE TABLE tags (
                      id SERIAL PRIMARY KEY,
                      name VARCHAR(50) UNIQUE NOT NULL,
                      slug VARCHAR(50) UNIQUE NOT NULL,
                      color VARCHAR(7) DEFAULT '#3B82F6',
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Post-Tag relationship (many-to-many)
CREATE TABLE post_tags (
                           post_id INTEGER REFERENCES posts(id) ON DELETE CASCADE,
                           tag_id INTEGER REFERENCES tags(id) ON DELETE CASCADE,
                           PRIMARY KEY (post_id, tag_id)
);

-- Comments table
CREATE TABLE comments (
                          id SERIAL PRIMARY KEY,
                          post_id INTEGER NOT NULL REFERENCES posts(id) ON DELETE CASCADE,
                          author_id INTEGER REFERENCES users(id) ON DELETE SET NULL,
                          author_name VARCHAR(100),
                          author_email VARCHAR(100),
                          content TEXT NOT NULL,
                          status VARCHAR(20) DEFAULT 'pending',
                          parent_id INTEGER REFERENCES comments(id) ON DELETE CASCADE,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Post likes table
CREATE TABLE post_likes (
                            id SERIAL PRIMARY KEY,
                            post_id INTEGER NOT NULL REFERENCES posts(id) ON DELETE CASCADE,
                            user_id INTEGER REFERENCES users(id) ON DELETE CASCADE,
                            ip_address INET,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            UNIQUE(post_id, user_id),
                            UNIQUE(post_id, ip_address)
);

-- Sessions table (optional, for database session storage)
CREATE TABLE sessions (
                          id VARCHAR(128) PRIMARY KEY,
                          user_id INTEGER REFERENCES users(id) ON DELETE CASCADE,
                          ip_address INET,
                          user_agent TEXT,
                          payload TEXT,
                          last_activity INTEGER
);

-- Create indexes for better performance
CREATE INDEX idx_posts_author ON posts(author_id);
CREATE INDEX idx_posts_category ON posts(category_id);
CREATE INDEX idx_posts_status ON posts(status);
CREATE INDEX idx_posts_created ON posts(created_at DESC);
CREATE INDEX idx_comments_post ON comments(post_id);
CREATE INDEX idx_post_likes_post ON post_likes(post_id);

-- Create updated_at trigger function
CREATE OR REPLACE FUNCTION update_updated_at_column()
    RETURNS TRIGGER AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$ language 'plpgsql';

-- Apply trigger to posts table
CREATE TRIGGER update_posts_updated_at BEFORE UPDATE ON posts
    FOR EACH ROW EXECUTE FUNCTION update_updated_at_column();

-- Apply trigger to users table
CREATE TRIGGER update_users_updated_at BEFORE UPDATE ON users
    FOR EACH ROW EXECUTE FUNCTION update_updated_at_column();

