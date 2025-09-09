@extends('layouts.master')
<?php
	$addListingUrl = (isset($addListingUrl)) ? $addListingUrl : \App\Helpers\UrlGen::addPost();
	$addListingAttr = '';
	if (!auth()->check()) {
		if (config('settings.single.guests_can_post_listings') != '1') {
			$addListingUrl = '#quickLogin';
			$addListingAttr = ' data-bs-toggle="modal"';
		}
	}
?>
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Programming Courses</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #673AB7;
            --secondary-color: #673AB7;
            --accent-color: #673AB7;
            --text-color: #1f2937;
            --light-bg: #f3f4f6;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-bg);
            color: var(--text-color);
            line-height: 1.7;
        }

        .hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            font-weight: 800;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }

        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .course-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .course-header h2 {
            margin: 0;
            font-size: 1.5rem;
        }

        .course-content {
            padding: 1.5rem;
        }

        .course-details {
            margin-top: 1rem;
        }

        .price-tag {
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .features-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
        }

        .features-list li:before {
            content: "•";
            color: var(--primary-color);
            font-weight: bold;
            margin-right: 0.5rem;
        }

        .contact-button {
            display: inline-flex;
            align-items: center;
            /* background: var(--primary-color); */
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 1rem;
            transition: background-color 0.3s ease;
        }

        .contact-button:hover {
            background: var(--secondary-color);
        }

        .contact-button i {
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Master Programming with Expert-Led Courses</h1>
        <p>Join our comprehensive programming courses and build real-world projects. Learn at your own pace with personalized guidance.</p>
    </div>

    <div class="container">
        <div class="courses-grid">
            <!-- Python Course -->
            <div class="course-card">
                <div class="course-header">
                    <i class="fab fa-python"></i>
                    <h2>Python Programming</h2>
                </div>
                <div class="course-content">
                    <div class="price-tag">$157 • 30 Days</div>
                    <div class="course-details">
                        <ul class="features-list">
                            <li>Python Fundamentals & Advanced Concepts</li>
                            <li>Data Structures & Algorithms</li>
                            <li>Web Scraping & Automation</li>
                            <li>Database Integration</li>
                            <li>Real-world Project Development</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/27676725888" class="contact-button" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        Contact Instructor
                    </a>
                </div>
            </div>

            <!-- Java Course -->
            <div class="course-card">
                <div class="course-header">
                    <i class="fab fa-java"></i>
                    <h2>Java Programming</h2>
                </div>
                <div class="course-content">
                    <div class="price-tag">$157 • 30 Days</div>
                    <div class="course-details">
                        <ul class="features-list">
                            <li>Core Java & OOP Concepts</li>
                            <li>Collections Framework</li>
                            <li>Multithreading & Concurrency</li>
                            <li>Database Connectivity (JDBC)</li>
                            <li>Enterprise Application Development</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/27818652278" class="contact-button" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        Contact Instructor
                    </a>
                </div>
            </div>

            <!-- React Course -->
            <div class="course-card">
                <div class="course-header">
                    <i class="fab fa-react"></i>
                    <h2>React Development</h2>
                </div>
                <div class="course-content">
                    <div class="price-tag">$135 • 30 Days</div>
                    <div class="course-details">
                        <ul class="features-list">
                            <li>Modern React & Hooks</li>
                            <li>State Management</li>
                            <li>Router & Navigation</li>
                            <li>API Integration</li>
                            <li>Full Stack Development</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/27818652278" class="contact-button" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        Contact Instructor
                    </a>
                </div>
            </div>

            <!-- Data Analysis Course -->
            <div class="course-card">
                <div class="course-header">
                    <i class="fas fa-database"></i>
                    <h2>Data Analysis</h2>
                </div>
                <div class="course-content">
                    <div class="price-tag">$267 • 30 Days</div>
                    <div class="course-details">
                        <ul class="features-list">
                            <li>Python & SQL Integration</li>
                            <li>Data Visualization</li>
                            <li>Statistical Analysis</li>
                            <li>Machine Learning Basics</li>
                            <li>Real-world Data Projects</li>
                        </ul>
                    </div>
                    <a href="https://wa.me/27676725888" class="contact-button" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                        Contact Instructor
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
