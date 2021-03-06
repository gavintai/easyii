<?php
$action = $this->context->action->id;

$backTo = null;
$indexUrl = '/admin/feedback';
$noanswerUrl = '/admin/feedback/a/noanswer';
$allUrl = '/admin/feedback/a/all';

if($action === 'view')
{
    $returnUrl = $this->context->getReturnUrl($indexUrl);

    if(strpos($returnUrl, 'noanswer') !== false){
        $backTo = 'noanswer';
        $noanswerUrl = $returnUrl;
    } elseif(strpos($returnUrl, 'all') !== false) {
        $backTo = 'all';
        $allUrl = $returnUrl;
    } else{
        $backTo = 'index';
        $indexUrl = $returnUrl;
    }
}
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= $indexUrl ?>">
            <?php if($backTo === 'index') : ?>
                <i class="glyphicon glyphicon-chevron-left font-12"></i>
            <?php endif; ?>
            <?= Yii::t('easyii', 'New') ?>
            <?php if($this->context->new > 0) : ?>
                <span class="badge"><?= $this->context->new ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'noanswer') ? 'class="active"' : '' ?>>
        <a href="<?= $noanswerUrl ?>">
            <?php if($backTo === 'noanswer') : ?>
                <i class="glyphicon glyphicon-chevron-left font-12"></i>
            <?php endif; ?>
            <?= Yii::t('easyii/feedback', 'No answer') ?>
            <?php if($this->context->noAnswer > 0) : ?>
                <span class="badge"><?= $this->context->noAnswer ?></span>
            <?php endif; ?>
        </a>
    </li>
    <li <?= ($action === 'all') ? 'class="active"' : '' ?>>
        <a href="<?= $allUrl ?>">
            <?php if($backTo === 'all') : ?>
                <i class="glyphicon glyphicon-chevron-left font-12"></i>
            <?php endif; ?>
            <?= Yii::t('easyii', 'All') ?>
        </a>
    </li>
    <?php if($action === 'view' && isset($noanswer) && !$noanswer) : ?>
        <li class="pull-right">
            <a href="/admin/feedback/a/setanswer/<?= Yii::$app->request->get('id') ?>" class="text-warning"><span class="glyphicon glyphicon-ok"></span> <?= Yii::t('easyii/feedback', 'Mark as answered') ?></a>
        </li>
    <?php endif; ?>    
</ul>
<br/>
