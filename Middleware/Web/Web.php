<?php
namespace Middleware\Web;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Pes\Http\Response;

use Pes\Container\Container;
use Pes\Logger\FileLogger;

use Container\ControllerContainerConfigurator;
use Container\ContextContainerConfigurator;

use Middleware\Web\Controller\Main;

class Web implements MiddlewareInterface {
    /**
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return Response
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler=NULL): ResponseInterface {

        $logger = FileLogger::getInstance('Logs', 'ApplicationLogger.log', FileLogger::APPEND_TO_LOG);

        $modelContainer = (new ControllerContainerConfigurator())->configure((new ContextContainerConfigurator())->configure(new Container()));
        /** @var Main $mainController */
        $mainController = $modelContainer->get(Main::class);
        return $mainController->page($request);
    }

}