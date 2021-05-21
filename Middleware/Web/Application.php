<?php
namespace Middleware\Web;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use Pes\Http\Response;
use Pes\Http\Request\RequestParams;
use Pes\View\View;
use Pes\View\Template\PhpTemplate;
use Pes\View\Renderer\PhpTemplateRenderer;
use Pes\Container\Container;
use Pes\Logger\FileLogger;

use Container\ContextContainerConfigurator;

use Model\UvodniStranka;
use Model\Pribehy;
use Model\Kraje;
use Model\NabidkaPrace;
use Model\Kontakt;



class Application implements MiddlewareInterface {
    /**
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return Response
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler=NULL): ResponseInterface {

        $logger = FileLogger::getInstance('Logs', 'ApplicationLogger.log', FileLogger::APPEND_TO_LOG);

        $modelContainer = (new ContextContainerConfigurator())->configure(new Container());

        $requestParams = new RequestParams();
        $mainTemplate = $requestParams->getParam($request, 'main', 'uvod');  // default uvod;
        $pribeh = $requestParams->getParam($request, 'pribeh', '');  // druhý parametr je default hodnota
        $kraj = $requestParams->getParam($request, 'kraj', '');

        switch ($mainTemplate) {
        case 'ohlasy_ctenaru':
            $templateName = "contents/main/ohlasy_ctenaru.php";
            $data = $modelContainer->get(OhlasyCtenaru::class)->getOdpovedi();
        break;
        case 'kontakt':
            $templateName ="contents/main/kontakt.php";
            $data = $modelContainer->get(Kontakt::class)->getKontakt();
        break;
        case 'prac_mista':
            $templateName = "contents/main/prac_mista.php";
            $data = [
                 $modelContainer->get(Kraje::class)->getVyberKraje($kraj),
                'nabidkaPraceVKraji' => $modelContainer->get(NabidkaPrace::class)->findPodleIdKraje($kraj)
            ];
        break;
        case 'pribehy':
            $templateName = "contents/main/pribehy.php";
            $data = $modelContainer->get(Pribehy::class)->findPribehyPerexyOstatni($pribeh);
        break;
        case 'pribeh':
            $templateName = "contents/main/pribeh.php";
            $data = [
                $modelContainer->get(Pribehy::class)->getPribehStudenta($pribeh),
                'perexyOstatni'=> $modelContainer->get(Pribehy::class)->findPribehyPerexyOstatni($pribeh)
            ];
        break;
        case 'skoly_firmy':
            $templateName = "contents/main/skoly_firmy.php";
            $data = $modelContainer->get( $skolyFirmy);
        break;
        case 'uvod':
        default:
            $templateName = "contents/main/uvod.php";
            $data = [
                    'uvodniSlovo' => $modelContainer->get(UvodniStranka::class)->getUvodniSlovo(),
                    'anotace' => $modelContainer->get(UvodniStranka::class)->getAnotace(),
                    'tematickeOkruhy' => $modelContainer->get(UvodniStranka::class)->getTematickeOkruhy(),
                    'ukazka' => $modelContainer->get(UvodniStranka::class)->getUkazka(),
                    'ohlasyCtenaruUvod' => $modelContainer->get(UvodniStranka::class)->getOhlasy(),
                    'kontakt' => $modelContainer->get(Kontakt::class)->getKontakt(),
                    ];
        }
        
        $template = (new PhpTemplate('contents/layout.php'));

        $view = (new View())->setRenderer(new PhpTemplateRenderer())->setTemplate($template)->setData($data);

        $response = new Response(200);
        $size = $response->getBody()->write($view->getString());
        return $response;
    }

}