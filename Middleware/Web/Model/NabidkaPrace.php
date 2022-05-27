<?php

namespace Middleware\Web\Model;

/**
 * Description of Prace
 *
 * @author pes2704
 */
class NabidkaPrace {
    
    private $pracePodleIdKraje = [
        "plzensky" => [
            "nazevKraje" => "Plzeňský kraj",
            "nabidka" => [
                "zamestnavatele" => [
                    "LOXXES" => [
                        "nazev" => "LOXXESS Bor s.r.o.",
                        "www" => "www.loxxess.com/cz"],
                    "Carrier" => [
                        "nazev" => "Carrier Refrigeration Operation Czech Rep. s.r.o.",
                        "www" => "www.carrier.com/commercial-refrigeration/cs/cz/"],
                    "Sony" => [
                        "nazev" => "Sony DADC Czech Republic, s.r.o.",
                        "www" => "sonydadc.jobs.cz"],
                    "Safran" => [
                        "nazev" => "Safran Cabin CZ s.r.o.",
                        "www" => "www.delamedoletadel.cz"],
                    "Canpack" => [
                        "nazev" => "Canpack Czech s.r.o.", "www" => "cz.canpack.com/#grow"
                    ],
                    "Invelt" => [
                        "nazev" => "Invelt – elektro s.r.o.",
                        "www" => "www.invelt.com"],
                ]
            ]
        ],
        "praha" => [
            "nazevKraje" => "město Praha",
            "nabidka" => [        
                "zamestnavatele" => [
                    "Ekostavby" => [
                        "nazev" => "EKOSTAVBY Louny s.r.o.",
                        "www" => "www.ekostavbylouny.cz"],
                    "SSI" => [
                        "nazev" => "SSI Technologies s.r.o.",
                        "www" => "www.ssi-sensors.com/czech/o-nas"],
                    "CRYTUR" => [
                        "nazev" => "CRYTUR, spol. s r.o.",
                        "www" => "www.crytur.cz"],
                    "Glatt" => [
                        "nazev" => "Glatt Pharma, spol. s r.o.",
                        "www" => "www.glattpharma.cz/"],
                    "ČEZ" => [
                        "nazev" => "ČEZ a.s.",
                        "www" => "www.cez.cz"],
                    "Unipetrol" => [
                        "nazev" => "Unipetrol RPA s.r.o.",
                        "www" => "www.orlenunipetrolrpa.cz"],
                    "ŘSD" => [
                        "nazev" => "Ředitelství silnic a dálnic ČR",
                        "www" => "www.rsd.cz"],
                    "VRL" => [
                        "nazev" => "VRL Praha a.s.",
                        "www" => "www.vrl.cz/"],
                    "Buhler" => [
                        "nazev" => "Bühler CZ s.r.o.",
                        "www" => "www.buhlercz.cz"],
                    "Carrier" => [
                        "nazev" => "Carrier Refrigeration Operation Czech Rep. s.r.o.",
                        "www" => "www.carrier.com/commercial-refrigeration/cs/cz/"],
                    "Bosch" => [
                        "nazev" => "Bosch Diesel s.r.o.",
                        "www" => "www.bosch.cz/"],
                ]
            ]
        ],
        "jihomoravsky" => [
            "nazevKraje" => "Jihomoravský kraj",
            "nabidka" => [        
                "zamestnavatele" => [
                    "Teplárny" => [
                        "nazev" => "Teplárny Brno a.s.",
                        "www" => "www.teplarny.cz"],
                    "SIGNALBAU" => [
                        "nazev" => "SIGNALBAU A.S.",
                        "www" => "signalbau.cz"],
                    "Glatt" => [
                        "nazev" => "Glatt Pharma, spol. s r.o.",
                        "www" => "www.glattpharma.cz/"],
                    "ČEZ" => [
                        "nazev" => "ČEZ a.s.",
                        "www" => "www.cez.cz"],
                    "Unipetrol" => [
                        "nazev" => "Unipetrol RPA s.r.o.",
                        "www" => "www.orlenunipetrolrpa.cz"],
                    "ŘSD" => [
                        "nazev" => "Ředitelství silnic a dálnic ČR",
                        "www" => "www.rsd.cz"],
                    "PCHelp" => [
                        "nazev" => "PC Help",
                        "www" => "www.pchelp.cz"],
                    "Buhler" => [
                        "nazev" => "Bühler CZ s.r.o.",
                        "www" => "www.buhlercz.cz"],
                    "Bosch" => [
                        "nazev" => "Bosch Diesel s.r.o.",
                        "www" => "www.bosch.cz/"],
                ]
            ]
        ],
        "moravskoslezsky" => [
            "nazevKraje" => "Moravskoslezský kraj",
            "nabidka" => [
                "zamestnavatele" => [
                    "SIGNALBAU" => [
                        "nazev" => "SIGNALBAU A.S.",
                        "www" => "signalbau.cz"],
                    "ČEZ" => [
                        "nazev" => "ČEZ a.s.",
                        "www" => "www.cez.cz"],
                    "ŘSD" => [
                        "nazev" => "Ředitelství silnic a dálnic ČR",
                        "www" => "www.rsd.cz"],
                ]
            ]   
        ],
        
    ];
    
    /**
     * 
     * @param mixed $idKraje
     * @return array
     * @throws \UnexpectedValueException Neznáma hodnota parametru idKraje
     */
    public function findPodleIdKraje($idKraje=NULL) {
        if (!isset($idKraje) OR !$idKraje) {
            return [];
        } elseif (isset($this->pracePodleIdKraje[$idKraje])) {
            return $this->pracePodleIdKraje[$idKraje];
        } else {
            throw new \UnexpectedValueException("Neznáma hodnota parametru idKraje $idKraje");
        }
    }
    
}
