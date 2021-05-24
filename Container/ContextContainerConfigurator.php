<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Container;

use Pes\Container\ContainerConfiguratorAbstract;

use Middleware\Web\Model\UvodniStranka;
use Middleware\Web\Model\ProFirmy;
use Middleware\Web\Model\RadyUspesnych;
use Middleware\Web\Model\Kontakt;
use Middleware\Web\Model\Kraje;
use Middleware\Web\Model\NabidkaPrace;
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
