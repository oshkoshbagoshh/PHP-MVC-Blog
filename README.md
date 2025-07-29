# Simple Blog Management System - PHP Practice Project

## Project Overview
Create a comprehensive blog management system using PHP, PostgreSQL, and jQuery. This intermediate-level project focuses on CRUD operations, user authentication, security best practices, and modern web development techniques.

---

## Core Requirements

### 1. User Authentication System
- **User Registration**: Secure registration with unique usernames and hashed passwords
- **User Login/Logout**: Session-based authentication with proper session management
- **Access Control**: Restrict create/edit/delete operations to authenticated users only
- **Password Security**: Use `password_hash()` and `password_verify()` functions

### 2. Blog Post Management (CRUD)
Each blog post must include:
- `id` (auto-increment primary key)
- `title` (varchar, max 255 characters)
- `content` (text, rich content support)
- `tags` (comma-separated or normalized table)
- `author_id` (foreign key to users table)
- `created_at` and `updated_at` timestamps
- `status` (draft, published, archived)

**Required Operations:**
- **Create**: Add new blog posts with validation
- **Read**: View post list and individual post details
- **Update**: Edit existing posts (author only)
- **Delete**: Remove posts with confirmation (author only)

### 3. Advanced Features
- **Tag System**: Filter posts by tags with dynamic loading
- **Search Functionality**: Search posts by title and content
- **Pagination**: Limit posts per page (10-15 posts)
- **Rich Text Editor**: Integrate TinyMCE or similar editor
- **Image Upload**: Allow featured images for posts

### 4. jQuery AJAX Integration (Required)
- **Post Deletion**: Delete posts without page reload
- **Tag Filtering**: Dynamic post filtering by tags
- **Search**: Real-time search suggestions
- **Like System**: Add/remove likes with AJAX
- **Comment System**: Add comments without page refresh

### 5. Security Requirements
- **SQL Injection Prevention**: Use prepared statements exclusively
- **XSS Protection**: Sanitize all output using `htmlspecialchars()`
- **CSRF Protection**: Implement CSRF tokens for forms
- **Input Validation**: Server-side validation for all user inputs
- **File Upload Security**: Validate file types and sizes

---

## PostgreSQL Database Schema

```sql
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
```

---

## CSS Styling Requirements

```css
/* Modern Blog Management System Styles */

/* CSS Variables for consistent theming */
:root {
    --primary-color: #3B82F6;
    --primary-dark: #1E40AF;
    --secondary-color: #64748B;
    --success-color: #10B981;
    --warning-color: #F59E0B;
    --danger-color: #EF4444;
    --light-bg: #F8FAFC;
    --dark-bg: #1E293B;
    --text-primary: #1F2937;
    --text-secondary: #6B7280;
    --border-color: #E5E7EB;
    --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

/* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    line-height: 1.6;
    color: var(--text-primary);
    background-color: var(--light-bg);
}

/* Header and Navigation */
.header {
    background: white;
    border-bottom: 1px solid var(--border-color);
    box-shadow: var(--shadow);
    position: sticky;
    top: 0;
    z-index: 100;
}

.navbar {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
}

.logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    text-decoration: none;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-links a {
    text-decoration: none;
    color: var(--text-secondary);
    font-weight: 500;
    transition: color 0.2s;
}

.nav-links a:hover,
.nav-links a.active {
    color: var(--primary-color);
}

/* Main Layout */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.main-content {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 2rem;
    margin-top: 2rem;
}

/* Cards and Components */
.card {
    background: white;
    border-radius: 8px;
    box-shadow: var(--shadow);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.card-header {
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
    background: var(--light-bg);
}

.card-body {
    padding: 1.5rem;
}

.card-footer {
    padding: 1rem 1.5rem;
    background: var(--light-bg);
    border-top: 1px solid var(--border-color);
}

/* Post Styles */
.post-grid {
    display: grid;
    gap: 2rem;
}

.post-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
}

.post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.post-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.post-content {
    padding: 1.5rem;
}

.post-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--text-primary);
}

.post-title a {
    text-decoration: none;
    color: inherit;
    transition: color 0.2s;
}

.post-title a:hover {
    color: var(--primary-color);
}

.post-excerpt {
    color: var(--text-secondary);
    margin-bottom: 1rem;
    line-height: 1.6;
}

.post-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.875rem;
    color: var(--text-secondary);
}

.post-author {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.post-date {
    font-size: 0.875rem;
}

/* Tags */
.tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin: 1rem 0;
}

.tag {
    background: var(--primary-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.2s;
}

.tag:hover {
    background: var(--primary-dark);
    color: white;
}

.tag.tag-filter {
    cursor: pointer;
    background: var(--secondary-color);
}

.tag.tag-filter.active {
    background: var(--primary-color);
}

/* Forms */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--text-primary);
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control.is-invalid {
    border-color: var(--danger-color);
}

.invalid-feedback {
    color: var(--danger-color);
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-primary {
    background: var(--primary-color);
    color: white;
}

.btn-primary:hover {
    background: var(--primary-dark);
    color: white;
}

.btn-secondary {
    background: var(--secondary-color);
    color: white;
}

.btn-success {
    background: var(--success-color);
    color: white;
}

.btn-danger {
    background: var(--danger-color);
    color: white;
}

.btn-outline {
    background: transparent;
    border: 1px solid var(--border-color);
    color: var(--text-primary);
}

.btn-outline:hover {
    background: var(--light-bg);
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Alerts */
.alert {
    padding: 1rem;
    border-radius: 6px;
    margin-bottom: 1rem;
}

.alert-success {
    background: #D1FAE5;
    color: #065F46;
    border: 1px solid #A7F3D0;
}

.alert-error {
    background: #FEE2E2;
    color: #991B1B;
    border: 1px solid #FECACA;
}

.alert-warning {
    background: #FEF3C7;
    color: #92400E;
    border: 1px solid #FDE68A;
}

/* Loading States */
.loading {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid #f3f3f3;
    border-top: 2px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Sidebar */
.sidebar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.widget {
    background: white;
    border-radius: 8px;
    box-shadow: var(--shadow);
    overflow: hidden;
}

.widget-header {
    padding: 1rem 1.5rem;
    background: var(--light-bg);
    border-bottom: 1px solid var(--border-color);
    font-weight: 600;
}

.widget-body {
    padding: 1.5rem;
}

/* Search */
.search-container {
    position: relative;
}

.search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid var(--border-color);
    border-top: none;
    border-radius: 0 0 6px 6px;
    max-height: 300px;
    overflow-y: auto;
    z-index: 10;
}

.search-result-item {
    padding: 0.75rem;
    border-bottom: 1px solid var(--border-color);
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-result-item:hover {
    background: var(--light-bg);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin: 2rem 0;
}

.pagination a,
.pagination span {
    padding: 0.5rem 0.75rem;
    border: 1px solid var(--border-color);
    text-decoration: none;
    color: var(--text-primary);
    border-radius: 4px;
    transition: all 0.2s;
}

.pagination a:hover {
    background: var(--light-bg);
}

.pagination .current {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar {
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
    }

    .nav-links {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .main-content {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .container {
        padding: 1rem;
    }

    .post-grid {
        gap: 1rem;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    :root {
        --light-bg: #0F172A;
        --text-primary: #F1F5F9;
        --text-secondary: #94A3B8;
        --border-color: #334155;
    }

    body {
        background-color: var(--dark-bg);
    }

    .card,
    .post-card,
    .widget {
        background: #1E293B;
        border: 1px solid var(--border-color);
    }

    .card-header,
    .card-footer,
    .widget-header {
        background: #0F172A;
    }
}
```

---

## Grading Criteria & Checklist

### Functionality (40 points)

| Feature | Points | Requirements | ✓ |
|---------|--------|--------------|---|
| User Registration | 5 | Unique usernames, hashed passwords, validation | |
| User Login/Logout | 5 | Session management, secure authentication | |
| Post Creation | 5 | Form validation, rich text editor, image upload | |
| Post Listing | 5 | Pagination, search, filtering | |
| Post Detail View | 5 | Full content display, comments, likes | |
| Post Editing | 5 | Author-only access, form pre-population | |
| Post Deletion | 5 | Confirmation dialog, AJAX implementation | |
| Tag System | 5 | Dynamic filtering, tag management | |

### jQuery AJAX Implementation (25 points)

| Feature | Points | Requirements | ✓ |
|---------|--------|--------------|---|
| AJAX Post Deletion | 5 | No page reload, confirmation dialog | |
| AJAX Tag Filtering | 5 | Dynamic post loading, smooth transitions | |
| AJAX Search | 5 | Real-time suggestions, debounced input | |
| AJAX Like System | 5 | Toggle likes, update counts | |
| AJAX Comments | 5 | Add comments without refresh, validation | |

### Security (20 points)

| Feature | Points | Requirements | ✓ |
|---------|--------|--------------|---|
| SQL Injection Prevention | 5 | Prepared statements only | |
| XSS Protection | 5 | Output sanitization, CSP headers | |
| CSRF Protection | 5 | Token validation on forms | |
| Input Validation | 5 | Server-side validation, error handling | |

### Code Quality (10 points)

| Feature | Points | Requirements | ✓ |
|---------|--------|--------------|---|
| Code Organization | 3 | MVC pattern, separation of concerns | |
| Documentation | 2 | Comments, README file | |
| Error Handling | 3 | Try-catch blocks, user-friendly errors | |
| Code Style | 2 | Consistent formatting, PSR standards | |

### Bonus Features (5 points)

| Feature | Points | Requirements | ✓ |
|---------|--------|--------------|---|
| Rich Text Editor | 1 | TinyMCE or CKEditor integration | |
| Image Upload | 1 | File validation, thumbnail generation | |
| User Roles | 1 | Admin/Editor/User permissions | |
| Email Notifications | 1 | Comment notifications, welcome emails | |
| API Endpoints | 1 | RESTful API for mobile app | |

---

## Testing Checklist

### Manual Tests

#### Authentication Tests
- [ ] Register new user with valid data
- [ ] Register with existing username (should fail)
- [ ] Register with invalid email format (should fail)
- [ ] Login with valid credentials
- [ ] Login with invalid credentials (should fail)
- [ ] Access protected pages without login (should redirect)
- [ ] Logout functionality works correctly

#### Post Management Tests
- [ ] Create post with valid data
- [ ] Create post with empty title (should fail)
- [ ] Create post with empty content (should fail)
- [ ] Edit own post successfully
- [ ] Try to edit another user's post (should fail)
- [ ] Delete own post with confirmation
- [ ] Try to delete another user's post (should fail)
- [ ] View post list with pagination
- [ ] View individual post details

#### AJAX Functionality Tests
- [ ] Delete post via AJAX without page reload
- [ ] Filter posts by tag without page reload
- [ ] Search posts with real-time results
- [ ] Like/unlike posts without page reload
- [ ] Add comments without page reload
- [ ] Form validation errors display correctly

#### Security Tests
- [ ] Try SQL injection in login form
- [ ] Try SQL injection in search
- [ ] Try XSS in post content
- [ ] Try XSS in comments
- [ ] Submit form without CSRF token (should fail)
- [ ] Upload malicious file (should fail)

### Automated Test Examples

```php
// Example PHPUnit tests
public function testUserCanRegister()
{
    $response = $this->post('/register', [
        'username' => 'testuser',
        'email' => 'test@example.com',
        'password' => 'password123',
        'password_confirm' => 'password123'
    ]);
    
    $this->assertEquals(302, $response->getStatusCode());
    $this->assertDatabaseHas('users', ['username' => 'testuser']);
}

public function testAjaxPostDeletion()
{
    $user = $this->createUser();
    $post = $this->createPost(['author_id' => $user->id]);
    
    $response = $this->delete('/api/posts/' . $post->id, [], [
        'HTTP_X_REQUESTED_WITH' => 'XMLHttpRequest'
    ]);
    
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
}
```

---

## Submission Requirements

### File Structure
```
blog-management-system/
├── README.md
├── composer.json
├── .env.example
├── database/
│   ├── schema.sql
│   └── seeds.sql
├── public/
│   ├── index.php
│   ├── css/
│   ├── js/
│   └── uploads/
├── src/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   └── Database/
├── templates/
├── tests/
└── vendor/
```

### Documentation Required
1. **README.md** with setup instructions
2. **API Documentation** for AJAX endpoints
3. **Database Schema** with relationships
4. **Security Measures** implemented
5. **Known Issues** and limitations

### Submission Checklist
- [ ] All functionality working as specified
- [ ] Security measures implemented
- [ ] AJAX features working without page reload
- [ ] Code follows PSR standards
- [ ] Database schema provided
- [ ] CSS styling complete and responsive
- [ ] Tests written and passing
- [ ] Documentation complete
- [ ] No sensitive data in repository
- [ ] .env.example provided

---

## Evaluation Process

1. **Code Review** (30%): Clean, organized, documented code
2. **Functionality Test** (40%): All features working as specified
3. **Security Assessment** (20%): Proper security measures implemented
4. **User Experience** (10%): Intuitive interface, responsive design

**Total Points: 100 + 5 bonus points**

**Grading Scale:**
- A: 90-100 points
- B: 80-89 points
- C: 70-79 points
- D: 60-69 points
- F: Below 60 points

Good luck with your project! Remember to focus on security, clean code, and user experience.