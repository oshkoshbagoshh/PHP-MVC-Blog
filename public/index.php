<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog Management System</title>
    <meta name="description" content="A simple blog management system front page" />
<!--    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />-->
<!--    Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!--    jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="assets/js/jq_functions.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

<!-- Header -->
<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-blue-600 hover:text-blue-700">MyBlog</a>
        <nav>
            <ul class="flex space-x-6 text-gray-600">
                <li><a href="#" class="hover:text-blue-600 font-semibold">Home</a></li>
                <li><a href="#" class="hover:text-blue-600">Categories</a></li>
                <li><a href="#" class="hover:text-blue-600">Tags</a></li>
                <li><a href="#" class="hover:text-blue-600">About</a></li>
                <li><a href="#" class="hover:text-blue-600">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Featured Post Section -->
<section class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold mb-6">Featured Post</h2>
    <article class="bg-white rounded-lg shadow overflow-hidden">
        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiByb2xlPSJpbWciIGFyaWEtbGFiZWw9IlBsYWNlaG9sZGVyOiBGZWF0dXJlZCBQb3N0IEltYWdlIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBzbGljZSIgZm9jdXNhYmxlPSJmYWxzZSI+CiAgPHJlY3Qgd2lkdGg9IjgwMCIgaGVpZ2h0PSI0MDAiIGZpbGw9IiNDQkQ1RTEiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZmlsbD0iIzY0NzQ4QiIgZHk9Ii4zZW0iIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIyNCIgdGV4dC1hbmNob3I9Im1pZGRsZSI+RmVhdHVyZWQgUG9zdCBJbWFnZTwvdGV4dD4KPC9zdmc+" alt="Featured Post Image" class="w-full h-64 object-cover" />
        <div class="p-6">
            <h3 class="text-2xl font-semibold mb-2 hover:text-blue-600 cursor-pointer">How to Build a Blog Management System</h3>
            <p class="text-gray-600 mb-4">Learn how to create a full-featured blog management system with PHP, PostgreSQL, and jQuery AJAX for dynamic interactions.</p>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Read More →</a>
        </div>
    </article>
</section>

<!-- Blog Posts Grid -->
<section class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold mb-6">Latest Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Post Card -->
        <article class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiByb2xlPSJpbWciIGFyaWEtbGFiZWw9IlBsYWNlaG9sZGVyOiBGZWF0dXJlZCBQb3N0IEltYWdlIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBzbGljZSIgZm9jdXNhYmxlPSJmYWxzZSI+CiAgPHJlY3Qgd2lkdGg9IjgwMCIgaGVpZ2h0PSI0MDAiIGZpbGw9IiNDQkQ1RTEiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZmlsbD0iIzY0NzQ4QiIgZHk9Ii4zZW0iIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIyNCIgdGV4dC1hbmNob3I9Im1pZGRsZSI+RmVhdHVyZWQgUG9zdCBJbWFnZTwvdGV4dD4KPC9zdmc+" alt="Post Image" class="w-full h-48 object-cover rounded-t-lg" />
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2 hover:text-blue-600 cursor-pointer">Getting Started with PostgreSQL</h3>
                <p class="text-gray-600 text-sm mb-4">A beginner's guide to setting up and using PostgreSQL in your PHP projects.</p>
                <a href="#" class="text-blue-600 font-semibold hover:underline">Read More →</a>
            </div>
        </article>

        <!-- Repeat similar post cards as needed -->
        <article class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiByb2xlPSJpbWciIGFyaWEtbGFiZWw9IlBsYWNlaG9sZGVyOiBGZWF0dXJlZCBQb3N0IEltYWdlIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBzbGljZSIgZm9jdXNhYmxlPSJmYWxzZSI+CiAgPHJlY3Qgd2lkdGg9IjgwMCIgaGVpZ2h0PSI0MDAiIGZpbGw9IiNDQkQ1RTEiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZmlsbD0iIzY0NzQ4QiIgZHk9Ii4zZW0iIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIyNCIgdGV4dC1hbmNob3I9Im1pZGRsZSI+RmVhdHVyZWQgUG9zdCBJbWFnZTwvdGV4dD4KPC9zdmc+" alt="Post Image" class="w-full h-48 object-cover rounded-t-lg" />
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2 hover:text-blue-600 cursor-pointer">Using jQuery AJAX in Your PHP Project</h3>
                <p class="text-gray-600 text-sm mb-4">Learn how to implement AJAX calls with jQuery for seamless user experience.</p>
                <a href="#" class="text-blue-600 font-semibold hover:underline">Read More →</a>
            </div>
        </article>

        <article class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
            <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwIiBoZWlnaHQ9IjQwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiByb2xlPSJpbWciIGFyaWEtbGFiZWw9IlBsYWNlaG9sZGVyOiBGZWF0dXJlZCBQb3N0IEltYWdlIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJ4TWlkWU1pZCBzbGljZSIgZm9jdXNhYmxlPSJmYWxzZSI+CiAgPHJlY3Qgd2lkdGg9IjgwMCIgaGVpZ2h0PSI0MDAiIGZpbGw9IiNDQkQ1RTEiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZmlsbD0iIzY0NzQ4QiIgZHk9Ii4zZW0iIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIyNCIgdGV4dC1hbmNob3I9Im1pZGRsZSI+RmVhdHVyZWQgUG9zdCBJbWFnZTwvdGV4dD4KPC9zdmc+" alt="Post Image" class="w-full h-48 object-cover rounded-t-lg" />
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2 hover:text-blue-600 cursor-pointer">CSS Grid and Flexbox for Responsive Layouts</h3>
                <p class="text-gray-600 text-sm mb-4">Master responsive design using CSS Grid and Flexbox techniques.</p>
                <a href="#" class="text-blue-600 font-semibold hover:underline">Read More →</a>
            </div>
        </article>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white border-t mt-16 py-6 text-center text-gray-500 text-sm">
    &copy; 2025 Blog Management System. All rights reserved.
</footer>

<!--Script-->
<!--<script src="assets/js/script.js"></script>-->

</body>
</html>