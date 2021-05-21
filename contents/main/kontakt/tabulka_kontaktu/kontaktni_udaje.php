<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                                            <tr>
                                                <th><?= Text::filter('mono',$nazevOddeleni)?></th>
                                                <td><?= Text::filter('mono',$kontakt)?></td>
                                            </tr>
                                            <tr>
                                                <td <?= Html::attributes($popisTdAttributes)?>><?= Text::filter('mono',$popis)?></td>
                                            </tr>