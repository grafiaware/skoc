<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                <main <?= Html::attributes(['class' => $templateName]) ?> >
                    <div class="ui centered grid">
                        <div class="fifteen wide mobile ten wide tablet eight wide computer column justified">
                             <?= $this->repeat("contents/main/pro_firmy/infoProFirmy.php", $infoProFirmy); ?>
                        </div>
                    </div>
                    <div class="ui centered grid">
                        <div class="fifteen wide mobile twelve wide tablet ten wide computer column center aligned">
                            <i class="comments outline circular icon"></i>
                            <?= Html::p(Text::filter('e|mono', $kontakt)) ?>
                        </div>
                    </div>
                </main>
