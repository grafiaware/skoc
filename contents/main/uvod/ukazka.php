<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                            <h2><?= Text::filter('mono',$nadpisSekce)?></h2>
                            <div class="ui grid">
                                <div class="sixteen wide column center aligned">
                                    <?= $this->repeat("contents/main/uvod/ukazka/odkaz_obrazek_popisek.php", $dataSekce['obrazky'])?>
                                </div>
                            </div>