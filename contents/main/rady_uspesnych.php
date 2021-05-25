<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                <main class="rady_uspesnych" >
                    <h2><?= Text::filter('mono', $nadpisSekce) ?></h2>
                    <?= Html::p(Text::filter('mono', $popisSekce)) ?>
                    <div class="ui centered grid">
                        <div class="fourteen wide column">
                            <div class="ui stretched two column grid">
                                <?= $this->repeat("contents/main/rady_uspesnych/rozdeleni_sloupcu.php", $rady)?>
                            </div>
                        </div>
                    </div>
                </main>

