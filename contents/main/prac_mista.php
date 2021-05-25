<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                <main class="prac_mista" >
                    <h2><?= Text::filter('mono',$nadpisSekce)?></h2>
                    <div class="ui centered grid">
                        <div class="sixteen wide mobile ten wide tablet fifteen wide computer column">
                            <?=$this->insert('contents/main/prac_mista/vyberKraje.php', $vyberKraje)?>
                        </div>
                        <div class="fourteen wide column">
                            <?=$this->insert('contents/main/prac_mista/nabidka.php', $nabidkaPraceVKraji, 'contents/main/prac_mista/vyberteKraj.php');?>
                        </div>
                    </div>
                </main>
