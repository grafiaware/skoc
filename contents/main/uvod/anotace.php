<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                            <h2><?= Text::filter('mono',$nazevSekce)?></h2>
                            <div class="ui two column centered grid">
                                <div class="fourteen wide mobile nine wide tablet eight wide computer column justified">
                                    <?= $this->insert("contents/main/uvod/anotace/text.php", $dataSekce)?>
                                </div>
                                <div class="sixteen wide mobile five wide tablet five wide computer column center aligned">
                                    <?= $this->repeat("contents/main/uvod/anotace/obrazek_popisek.php", $dataSekce['obrazky'])?>
                                </div>
                            </div>