<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                                        <div class="ui segment">
                                            <h3><?= Text::filter('mono', $jmeno) ?></h3>
                                            <p class="ui tag label"><?= Text::filter('mono', $zamestnani) ?></p> 
                                            <?= Html::p(Text::filter('mono', $text)) ?> 
                                        </div>

        

