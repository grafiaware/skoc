<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                            <div class="ui two column centered grid">
                                <div class="fourteen wide mobile nine wide tablet eight wide computer column justified">
                                    <?= $this->repeat("contents/main/uvod/uvodniSlovo/otazka.php", $text['kurziva'], 'otazka')?> 
                                    <?= $this->insert("contents/main/uvod/uvodniSlovo/text.php", $text)?> 
                                </div>
                                <div class="sixteen wide mobile five wide tablet five wide computer column middle aligned">
                                    <div class="flex-images">
                                        <?= $this->repeat("contents/main/uvod/uvodniSlovo/odkaz_obrazek.php", $obrazky)?>
                                    </div>
                                </div>
                            </div>
