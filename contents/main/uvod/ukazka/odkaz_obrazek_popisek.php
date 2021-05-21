<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                                    <a <?= Html::attributes($odkazAttributes)?>>
                                        <img <?= Html::attributes($imgAttributes)?>/>
                                        <?= Html::p(Text::filter('mono',$popisek))?>
                                    </a>

