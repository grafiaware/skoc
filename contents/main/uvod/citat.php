<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                    <div class="ui two column centered grid">
                        <div class="sixteen wide mobile five wide tablet four wide computer column">
                            <img <?= Html::attributes($ilustracniObrazek)?> />
                        </div>
                        <div class="fourteen wide mobile eight wide tablet seven wide computer column middle aligned justified">
                            <p><i><?= Text::filter('mono',$textCitatu)?></i></p>
                            <?= Html::p(Text::filter('e|mono',$autorCitatu))?>
                        </div>
                    </div>