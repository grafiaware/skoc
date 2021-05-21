<?php
namespace Model;

class UvodniStranka{
    
    const IMAGES = "public/images/";
    const PDF = "public/pdf/";
    
    
    private $anotace = [
        'nazevSekce' => 'Anotace',
        'dataSekce' => [
            'odstavec' => 
                'Jedná se o devadesátistránkového průvodce s vysokou informační hodnotou, který je psán vtipnou formou s mnoha příklady, které studentům pomáhají v budoucím profesním životě. Publikace je připravována na základě výzkumu na technických univerzitách a poptávky stduentů a je každoročně inovována. V závěru knihy jsou citovány významné osobnosti, personalisté i úspěšní absolventi, kteří odpovídají na otázku, co jim samotným v kariéře pomohlo a co by studentům doporučili. V závěru publikace absolventi naleznou výhradně personální inzerci.

                <b>Budoucí absolventi</b> v jednotlivých krajích obdrží knihu zdarma.

                Ostatní mají možnost si publikaci <a class="textovy-odkaz" href="https://form.simpleshop.cz/d8Mn/buy/" target="blank">zakoupit</a>'
            ,
            'obrazky' => [
                [
                    'imgAttributes' => ['src' => self::IMAGES.'autorka.jpg', 'alt' => 'autorka'],
                    'pAttributes' => ['class' => 'popisek-obrazku'],
                    'popisek' => 'Autorka publikace Plav, <br/> Mgr. Jana Brabcová'
                ]
            ]
        ]
    ];
    
    private $tematickeOkruhy = [
        'nazevSekce' => 'Tématické okruhy',
        'dataSekce' => [
            [
                "sloupec" => [
                    'Kdo jsem a kam směřuji',
                    'Sebemotivace',
                    'Volba typu pracovní kariéry',
                    'Volba zaměstnavatele',
                    'Dojíždění a teleworking',
                    'Práce v zahraničí',
                    'Hleďte si svého'
                ]
            ],[
                "sloupec" => [
                    'Životopis, který zaujme',
                    'Image a profesionální chování',
                    'Korespondence se zaměstnavatelem',
                    'Pracovní a personální agentury',
                    'Nástup do zaměstnání',
                    'První krůčky v zaměstnání',
                    'Power talking'
                ]
            ],[
                "sloupec" => [
                    'Plánování práce a úkolů',
                    'První nezdary',
                    'Osobní komunikace, konkurs',
                    'Komunikace s vedoucími',
                    'Základy společenského chování',
                    'Work-life balance',
                    'Často kladené dotazy'
                ]
            ],[
                "sloupec" => [
                    'Moderní flexibilní formy práce',
                    'Autorské právo',
                    'Právní minimum',
                    'Když nevíte ani teď...',
                    'Doporučená literatura, odkazy'
                ]
            ]
        ]
    ];
    
    private $ukazka = [
        'nadpisSekce' => 'Ukázka',
        'dataSekce' => [
            'obrazky' => [
                [
                    'odkazAttributes' => ['href' => self::PDF.'ukazka1.pdf'],
                    'imgAttributes' => ['src' => self::IMAGES.'ukazka1-img.jpg', 'alt' => 'ukázka z knížky'],
                    'popisek' => 'Zobrazit'
                ],
                [
                    'odkazAttributes' => ['href' => self::PDF.'ukazka2.pdf'],
                    'imgAttributes' => ['src' => self::IMAGES.'ukazka2-img.jpg', 'alt' => 'ukázka z knížky'],
                    'popisek' => 'Zobrazit'
                ],
                [
                    'odkazAttributes' => ['href' => self::PDF.'ukazka3.pdf'],
                    'imgAttributes' => ['src' => self::IMAGES.'ukazka3-img.jpg', 'alt' => 'ukázka z knížky'],
                    'popisek' => 'Zobrazit'
                ]
            ]
        ]
    ];
    
    private $citat = [
            'textCitatu' => 'Jakmile dokončíme školu, většina z nás si uvědomí, že nerozhodují vysokoškolské tituly nebo známky. Ve skutečném světě mimo akademickou půdu, je zapotřebí něčeho jiného než pouhých diplomů. Mám za to, že tomu říkají kuráž, opovážlivost, být pánem situace, smělost, odvaha, mazanost, troufalost, neústupnost a brilantnost. Tento faktor, ať už ho nazýváme jakkoli, rozhodne v konečném slova smyslu o budoucnosti jedince víc než známky ze školy.',
            'autorCitatu' => 'Robert T. Kiyosaki',
            'ilustracniObrazek' => ['class' => 'ui centered image', 'src' => self::IMAGES.'panak-citace.png', 'alt' => 'citát']
    ];
    
    
    
       
    public function getAnotace(){
        foreach ($this->anotace['dataSekce']['obrazky'] as $key=>$value) {
            $this->addElementsToArrayItem($this->anotace['dataSekce']['obrazky'][$key]['imgAttributes'], ['class'=>"ui image"]);
        }
        return $this->anotace; 
    }
    
    public function getTematickeOkruhy(){
        return $this->tematickeOkruhy;
    }

    public function getUkazka(){
        foreach ($this->ukazka['dataSekce']['obrazky'] as $key=>$value) {
            $this->addElementsToArrayItem($this->ukazka['dataSekce']['obrazky'][$key]['odkazAttributes'], ['target' => 'blank', 'class' =>'ui large image']);
        }
        return $this->ukazka;
    }
    
    public function getCitat(){
        return $this->citat;
    }
    
    private function addElementsToArrayItem(&$arrayItem, $addedArray) {
        $arrayItem = array_merge($arrayItem, $addedArray);
    }
}

