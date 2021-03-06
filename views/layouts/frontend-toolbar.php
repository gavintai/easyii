<?php
use yii\helpers\Html;
use yii\easyii\assets\FrontendAsset;
use yii\easyii\models\Setting;

$asset = FrontendAsset::register($this);
$position = Setting::get('toolbar_position') === 'bottom' ? 'bottom' : 'top';
$this->registerCss('body {padding-'.$position.': 50px;}');
?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<nav id="easyii-navbar" class="navbar navbar-inverse navbar-fixed-<?= $position ?>">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="/admin"><span class="glyphicon glyphicon-arrow-left"></span> <?= Yii::t('easyii', 'Control panel') ?></a></li>
        </ul>
        <p class="navbar-text"><i class="glyphicon glyphicon-pencil"></i> Live edit</p>
        <?= Html::checkbox('', LIVE_EDIT) ?>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/sign/out"><span class="glyphicon glyphicon-log-out"></span> <?= Yii::t('easyii', 'Logout') ?></a></li>
        </ul>
    </div>
</nav>