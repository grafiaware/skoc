<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Container;

use Pes\Container\ContainerConfiguratorAbstract;
use Pes\Http\RequestInterface;

use Model\UvodniStranka;
use Model\ProFirmy;
use Model\RadyUspesnych;
use Model\Kontakt;
use Model\Kraje;
use Model\NabidkaPrace;
/**
 * Description of ContextDefinition
 *
 * @author pes2704
 */
class ContextContainerConfigurator extends ContainerConfiguratorAbstract {
    public function getAliases() {
        return [];
    }
    public function getParams() {
        return [];
    }

    public function getServicesDefinitions() {
        return  [
        UvodniStranka::class => function($c) {return
            new UvodniStranka();
        },
        ProFirmy::class => function($c) {return
            new ProFirmy();
        },
        RadyUspesnych::class => function($c) {return
            new RadyUspesnych();
        },
        Kontakt::class => function($c) {return
            new Kontakt();
        },
        Kraje::class => function($c) {return
            new Kraje();
        },
        NabidkaPrace::class => function($c) {return
            new NabidkaPrace();
        }

        ];
    }

    public function getServicesOverrideDefinitions() {
        return [];
    }
    public function getFactoriesDefinitions() {
        return [];
    }
}
