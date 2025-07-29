-- Insert sample users
INSERT INTO users (id, username, email, password_hash, created_at, updated_at) VALUES
                                                                                   (1, 'ajjavadi', 'amirjavadi25@gmail.com', '$2y$10$examplehashforpassword', NOW(), NOW()),
                                                                                   (2, 'janedoe', 'jane@example.com', '$2y$10$examplehashforpassword', NOW(), NOW());

-- Insert sample categories
INSERT INTO categories (id, name, slug, created_at, updated_at) VALUES
                                                                    (1, 'Technology', 'technology', NOW(), NOW()),
                                                                    (2, 'Programming', 'programming', NOW(), NOW()),
                                                                    (3, 'Design', 'design', NOW(), NOW());

-- Insert sample tags
INSERT INTO tags (id, name, slug, created_at, updated_at) VALUES
                                                              (1, 'PHP', 'php', NOW(), NOW()),
                                                              (2, 'PostgreSQL', 'postgresql', NOW(), NOW()),
                                                              (3, 'Vue.js', 'vuejs', NOW(), NOW()),
                                                              (4, 'Docker', 'docker', NOW(), NOW()),
                                                              (5, 'Tailwind CSS', 'tailwind-css', NOW(), NOW());

-- Insert sample blog posts
INSERT INTO blog_posts (id, user_id, category_id, title, slug, content, published_at, created_at, updated_at) VALUES
                                                                                                                  (1, 1, 2, 'Getting Started with PHP and PostgreSQL', 'getting-started-php-postgresql', 'This post explains how to set up PHP with PostgreSQL...', NOW(), NOW(), NOW()),
                                                                                                                  (2, 2, 1, 'Using Docker for Local Development', 'using-docker-local-development', 'Docker simplifies local dev environments...', NOW(), NOW(), NOW()),
                                                                                                                  (3, 1, 3, 'Responsive Design with Tailwind CSS', 'responsive-design-tailwind-css', 'Tailwind CSS makes responsive design easy...', NOW(), NOW(), NOW());

-- Pivot table: blog_post_tags (many-to-many)
INSERT INTO blog_post_tags (blog_post_id, tag_id) VALUES
                                                      (1, 1),
                                                      (1, 2),
                                                      (2, 4),
                                                      (3, 5);

