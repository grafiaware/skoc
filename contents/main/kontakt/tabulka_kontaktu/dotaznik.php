<?php
use Pes\Text\Text;
use Pes\Text\Html;
?>
                                            <tr>
                                                <td <?= Html::attributes($dotaznikTdAttributes)?>>
                                                    <?= Text::filter('mono', $text)?>
                                                </td>
                                            </tr>