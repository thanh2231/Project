<?php

/** @var yii\web\View $this */
/** @var string $content */
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script type="text/javascript">
		var baseUrl = "<?= Yii::$app->homeUrl ?>";
		var controllerId = "<?= Yii::$app->controller->id ?>";
		
    </script>
	<?php
// 	$this->registerJsFile(Yii::$app->homeUrl . "js/main.js", [
// 	    'depends' => [
// 	        AppAsset::class
// 	    ],
// 	    'position' => \yii\web\View::POS_END
// 	]);
    $this->registerCssFile(Yii::$app->homeUrl . "css/font-awesome/css/all.min.css");
    $this->registerCssFile(Yii::$app->homeUrl . "css/main.css");
    ?>
</head>
<body class="d-flex flex-column h-100 h5">
<?php $this->beginBody() ?>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark nav-dark fixed-top  '
        ]
    ]);
    $navItem = [
        [
            'label' => 'Home',
            'url' => [
                '/site/index'
            ]
        ],
        [
            'label' => 'Cart',
            'url' => [
                '/site/about'
            ]
        ],
        [
            'label' => 'About',
            'url' => [
                '/site/about'
            ]
        ],
        [
            'label' => 'Contact',
            'url' => [
                '/site/contact'
            ]
        ],
        
    ];
    if (Yii::$app->user->isGuest) {
        array_push($navItem, [
            'label' => 'Login',
            'url' => [
                '/site/login'
                
            ]
        ]);
    } else {
        array_push($navItem, '<li>' . Html::beginForm([
            '/site/logout'  
        ], 'post', [
            'class' => 'form-inline'
        ]) . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', [
            'class' => 'btn btn-link logout'
        ]) . Html::endForm() . '</li>');
    }
    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav p-4 d-flex justify-content-around'
        ],
        'items' => $navItem
    ]);
    NavBar::end();
    ?>
</header>

	<main role="main" class="flex-shrink-0">
		<div class="container">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	</main>

	<footer class="footer mt-auto py-3 text-muted">
		<div class="container">
			<p class="float-left">&copy; My Company 2022</p>
			<p class="float-right">Powered by <a href="https://www.yiiframework.com/" rel="external">Yii Framework</a></p>
		</div>
	</footer>

<?php $this->endBody() ?>
</body>
 
</html>
<?php $this->endPage() ?>