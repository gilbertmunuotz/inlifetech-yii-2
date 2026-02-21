<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Portfolio';
?>

<div class="site-portfolio">
    <div class="container mt-5">
        <h1>Selected Projects</h1>
        <hr>

        <div class="card mb-4 p-3">
            <h4>AI Chat Application</h4>
            <p>
                A chatbot system powered by local LLM models with authentication
                and structured response rendering.
            </p>
            <strong>Technologies:</strong> Node.js, Express, JWT, LLM Integration
        </div>

        <div class="card mb-4 p-3">
            <h4>Digital Wallet System</h4>
            <p>
                A secure wallet application supporting transactions,
                analytics, and account linking.
            </p>
            <strong>Technologies:</strong> Spring Boot, MySQL, JWT
        </div>

        <div class="card mb-4 p-3">
            <h4>Attack Surface Mapping Tool</h4>
            <p>
                A security-focused web analysis tool that maps exposed endpoints
                and evaluates HTTP responses.
            </p>
            <strong>Technologies:</strong> Python, Networking, HTTP Analysis
        </div>
    </div>
</div>