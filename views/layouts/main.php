<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark fixed-top custom-navbar']
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Portfolio', 'url' => ['/site/portfolio']]
                // ['label' => 'Contact', 'url' => ['/site/contact']],
                // Yii::$app->user->isGuest
                // ? ['label' => 'Login', 'url' => ['/site/login']]
                // : '<li class="nav-item">'
                //     . Html::beginForm(['/site/logout'])
                //     . Html::submitButton(
                //         'Logout (' . Yii::$app->user->identity->username . ')',
                //         ['class' => 'nav-link btn btn-link logout']
                //     )
                //     . Html::endForm()
                //     . '</li>'
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <?php if (Yii::$app->controller->action->id === 'index'): ?>
            <?= $content ?>
        <?php else: ?>
            <div class="container">
                <?= $content ?>
            </div>
        <?php endif; ?>
    </main>

    <footer class="custom-footer text-white mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6">
                    <h5>System Status</h5>
                    <p>Server: Online</p>
                    <p>Framework: Yii2</p>
                    <p>Environment: Development</p>
                </div>

                <div class="col-md-6 text-md-end">
                    <h5>Performance Metrics</h5>
                    <p>Execution Time: <?= Yii::getLogger()->getElapsedTime() ?>s</p>
                    <p>Memory Usage: <?= round(memory_get_peak_usage() / 1024 / 1024, 2) ?> MB</p>
                    <p>&copy; <?= date('Y') ?> Intelligent Systems Lab</p>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>