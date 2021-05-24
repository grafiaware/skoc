<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Container;

use Pes\Container\ContainerConfiguratorAbstract;

use Middleware\Web\Controller\Main;

/**
 * Description of ControllerContainerConfigurator
 *
 * @author pes2704
 */
class ControllerContainerConfigurator extends ContainerConfiguratorAbstract {

    public function getAliases() {
        return [];
    }
    public function getParams() {
        return [];
    }

    public function getServicesDefinitions() {
        return  [
            Main::class =>  function($c) {return
                new Main($c);
            },
        ];
    }

    public function getServicesOverrideDefinitions() {
        return [];
    }
    public function getFactoriesDefinitions() {
        return [];
    }}
