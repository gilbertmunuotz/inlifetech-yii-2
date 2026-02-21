<?php
$this->title = 'Home';
?>

<div class="site-index">

    <!-- HERO SECTION -->
    <div class="hero-section text-white d-flex align-items-center justify-content-center">
        <div class="text-center hero-content">
            <h1 class="display-4">Building Intelligent Software Systems</h1>
            <p class="lead">
                We design scalable backend systems and AI-driven applications
                using modern software engineering principles.
            </p>
            <a class="btn btn-primary btn-lg mt-3" href="<?= \yii\helpers\Url::to(['site/portfolio']) ?>">
                View Our Work
            </a>
        </div>
    </div>

    <!-- FEATURES SECTION -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <h3>Backend Engineering</h3>
                <p>Designing REST APIs, authentication systems, and scalable architectures.</p>
            </div>

            <div class="col-md-4">
                <h3>Artificial Intelligence</h3>
                <p>Exploring LLM integration, machine learning fundamentals, and AI-powered tools.</p>
            </div>

            <div class="col-md-4">
                <h3>System Design</h3>
                <p>Applying data structures, algorithms, and clean architecture principles.</p>
            </div>
        </div>
    </div>

</div>