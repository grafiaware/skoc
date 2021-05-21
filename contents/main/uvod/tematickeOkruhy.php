<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                            <h2><?= Text::filter('mono',$nazevSekce)?></h2>
                            <div class="ui centered grid">
                                <div class="fourteen wide mobile twelve wide tablet twelve wide computer column">
                                    <div class="ui doubling stackable four column grid">
                                        <?= $this->repeat("contents/main/uvod/tematickeOkruhy/ul_li.php", $dataSekce)?>
                                    </div>
                                </div>
                            </div>