<?php
namespace Middleware\Web\Model;

class Kontakt{

    private $nadpisSekce = 'Kontakt';

    private $tymGrafia = 'Těšíme se na spolupráci! <p> Tým Grafia, s.r.o. </p>';

    private $dataSekce = [
        'kontaktniUdaje' => [
            [
                'nazevOddeleni' => 'Kontakt inzerce:',
                'kontakt' => 'info@grafia.cz, 377 227 701',
                'popis' => '(Objednávky, obchodní komunikace)',
                'popisTdAttributes' => ['colspan' => '2']
            ],
            [
                'nazevOddeleni' => 'Kontakt redakce:',
                'kontakt' => 'absolvent@grafia.cz',
                'popis' => '(Připomínky k textu)',
                'popisTdAttributes' => ['colspan' => '2']
            ],
            [
                'nazevOddeleni' => 'Kontakt produkce:',
                'kontakt' => 'produkce@grafia.cz',
                'popis' => '(Zaslání inzerátu, pomoc s výrobou inzerce)',
                'popisTdAttributes' => ['colspan' => '2']
            ]
        ],
        'dotaznik' => [
            'text' => 'Měl/a jste publikaci v ruce a chcete nám sdělit svůj názor? Vyplňte prosím
                       <a href="https://goo.gl/forms/5eQI5Ac2xnRhLgzL2" target="blank">dotazník</a>',
            'dotaznikTdAttributes' => ['colspan' => '2']
        ]
    ];

    public function getNadpisSekce() {
        return $this->nadpisSekce;
    }

    public function getDataSekce(){
        return $this->dataSekce;
    }

    public function getTymGrafia() {
        return $this->tymGrafia;
    }

}

