                        <section class="anotace">
                            <?= $this->insert("contents/main/uvod/anotace.php", $anotace)?> 
                        </section>
                        <section class="tem-okruhy"> 
                            <?= $this->insert("contents/main/uvod/tematickeOkruhy.php", $tematickeOkruhy)?>  
                        </section>
                        <section class="ukazka">
                            <?= $this->insert("contents/main/uvod/ukazka.php", $ukazka) ?>
                        </section>
                        <section class="citat">
                            <?= $this->insert("contents/main/uvod/citat.php", $citat) ?>
                        </section>
                        <?= $this->insert("contents/main/kontakt.php", $kontakt) ?>
                        