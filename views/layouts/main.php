<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use mdm\admin\components\MenuHelper;
use mdm\admin\components\Helper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Pegawai', 'url' => ['/pegawai/index']],
        ['label' => 'Kriteria', 'url' => ['/kriteria/index']],
        ['label' => 'Penilaian', 'url' => ['/penilaian/index']],
        ['label' => 'Laporan', 'url' => ['/laporan/index']],
        ['label' => 'User Management', 'url' => ['/admin/assignment/index']],
    ];

    $menuItems = Helper::filter($menuItems);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItems,
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-tab'],
        'items' => [
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],

            Yii::$app->user->isGuest
            ? (['label' => 'Login', 'url' => ['/site/login']])
            : ([
                'label' => Yii::$app->user->identity->username,
                'items' => [
                    ['label' => 'Setting', 'url' => ['/user/view/', 'id' => Yii::$app->user->id]],
                    '<li class="divider"></li>',
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post'],
                    ],
                ],
            ])
        ],
    ]);

    // $menuItems = MenuHelper::getAssignedMenu(Yii::$app->user->id);
        
    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-left'],
    //     'items' => $menuItems,
    // ]);

    // echo Nav::widget([
    //     'options' => ['class' => 'navbar-nav navbar-right'],
    //     'items' => [
    //         Yii::$app->user->isGuest
    //         ? (['label' => 'Login', 'url' => ['/site/login']])
    //         : (
    //             '<li>'
    //             . Html::beginForm(['/site/logout'], 'post')
    //             . Html::submitButton(
    //                 'Logout (' . Yii::$app->user->identity->username . ')',
    //                 ['class' => 'btn btn-link logout']
    //             )
    //             . Html::endForm()
    //             . '</li>'
    //         ),
    //     ],
    // ]);
    // $menuItems = [
    //     ['label' => 'Home', 'url' => ['/site/index']],
    //     ['label' => 'Pegawai', 'url' => ['/pegawai/index']],
    //     ['label' => 'Kriteria', 'url' => ['/kriteria']],
    //     ['label' => 'Penilaian', 'url' => ['/penilaian']],
    //     ['label' => 'Laporan', 'url' => ['/laporan']],

    // ];

    // $menuItems = Helper::filter($menuItems);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<div class="ajax-loader" style="display:none; z-index:9999">
    <div class="loader">Loading...</div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
