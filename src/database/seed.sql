-- Insert sample users

INSERT INTO users (username, email, password, first_name, last_name, avatar, role, is_active, created_at, updated_at)
VALUES ('ajjavadi', 'amirjavadi25@gmail.com', '$2y$10$examplehashforpassword', 'AJ', 'Javadi', NULL, 'admin', true,
        NOW(), NOW()),
       ('janedoe', 'jane@example.com', '$2y$10$examplehashforpassword', 'Jane', 'Doe', NULL, 'user', true, NOW(),
        NOW());

-- Insert sample categories
INSERT INTO categories (name, slug, description, created_at)
VALUES ('Technology', 'technology', 'Posts about technology trends and news.', NOW()),
       ('Programming', 'programming', 'Coding tutorials and programming tips.', NOW()),
       ('Design', 'design', 'Design principles and UI/UX articles.', NOW());

-- Insert sample tags
INSERT INTO tags (name, slug, color, created_at)
VALUES ('PHP', 'php', '#4F46E5', NOW()),
       ('PostgreSQL', 'postgresql', '#336791', NOW()),
       ('Vue.js', 'vuejs', '#42B883', NOW()),
       ('Docker', 'docker', '#2496ED', NOW()),
       ('Tailwind CSS', 'tailwind-css', '#38B2AC', NOW());

-- Insert sample posts
INSERT INTO posts (title, slug, content, excerpt, featured_image, status, author_id, category_id, views_count,
                   likes_count, created_at, updated_at)
VALUES ('Getting Started with PHP and PostgreSQL', 'getting-started-php-postgresql',
        'This post explains how to set up PHP with PostgreSQL...', 'Set up PHP with PostgreSQL easily.', NULL,
        'published', 1, 2, 120, 15, NOW(), NOW()),
       ('Using Docker for Local Development', 'using-docker-local-development',
        'Docker simplifies local dev environments...', 'Docker for local dev.', NULL, 'published', 2, 1, 85, 10, NOW(),
        NOW()),
       ('Responsive Design with Tailwind CSS', 'responsive-design-tailwind-css',
        'Tailwind CSS makes responsive design easy...', 'Make responsive designs with Tailwind.', NULL, 'published', 1,
        3, 95, 12, NOW(), NOW());

-- Insert post-tag relationships
INSERT INTO post_tags (post_id, tag_id)
VALUES (1, 1),
       (1, 2),
       (2, 4),
       (3, 5);

-- Insert sample comments
INSERT INTO comments (post_id, author_id, author_name, author_email, content, status, parent_id, created_at)
VALUES (1, 2, NULL, NULL, 'Great post on PHP and PostgreSQL!', 'approved', NULL, NOW()),
       (1, NULL, 'Guest User', 'guest@example.com', 'Thanks for the helpful information.', 'pending', NULL, NOW()),
       (2, 1, NULL, NULL, 'Docker is a game changer!', 'approved', NULL, NOW());

-- Insert sample post likes
INSERT INTO post_likes (post_id, user_id, ip_address, created_at)
VALUES (1, 1, '192.168.1.10', NOW()),
       (1, 2, '192.168.1.11', NOW()),
       (2, 1, '192.168.1.10', NOW());

