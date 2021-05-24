<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                <main class="kontakt" >
                        <section>
                            <h2><?= Text::filter('mono',$nadpisSekce)?></h2>
                            <div class="ui centered grid">
                                <div class="fourteen wide mobile ten wide tablet six wide computer column center aligned">
                                    <?= $this->insert("contents/main/kontakt/tabulka_kontaktu.php", $dataSekce) ?>
                                    <span><?= Text::filter('mono', $tymGrafia)?></span>
                                </div>
                            </div>
                        </section>
                </main>
