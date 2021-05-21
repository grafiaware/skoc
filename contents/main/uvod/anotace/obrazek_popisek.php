<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
            <img <?= Html::attributes($imgAttributes)?>/>
            <p <?= Html::attributes($pAttributes)?>><?= Text::filter('mono',$popisek)?></p>
