<?php
namespace Middleware\Web\Controller;

use Psr\Http\Message\ServerRequestInterface;

use Pes\Http\Response;
use Pes\Http\Request\RequestParams;
use Pes\View\View;
use Pes\View\Template\PhpTemplate;
use Pes\View\Renderer\PhpTemplateRenderer;
use Pes\Logger\FileLogger;

use Psr\Container\ContainerInterface;

use Middleware\Web\Model\UvodniStranka;
use Middleware\Web\Model\ProFirmy;
use Middleware\Web\Model\RadyUspesnych;
use Middleware\Web\Model\Kraje;
use Middleware\Web\Model\NabidkaPrace;
use Middleware\Web\Model\Kontakt;


/**
 * Description of Main  
 *
 * @author pes2704
 */
class Main {

    /**
     *
     * @var ContainerInterface
     */
    private $container;


    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function page(ServerRequestInterface $request) {
        $requestParams = new RequestParams();
        $mainTemplate = $requestParams->getParam($request, 'main', 'uvod');  // default uvod;
        //$pribeh = $requestParams->getParam($request, 'pribeh', '');  // druhý parametr je default hodnota
        $kraj = $requestParams->getParam($request, 'kraj', '');

        switch ($mainTemplate) {
//        case 'ohlasy_ctenaru':
//            $data = ['templateName' => "contents/main/ohlasy_ctenaru.php"] + $this->container->get(OhlasyCtenaru::class)->getOdpovedi();
//        break;
        case 'kontakt':
            $data = ['templateName' => "contents/main/kontakt.php"] + $this->container->get(Kontakt::class)->getKontakt();
        break;
        case 'prac_mista':
            $data =
                ['templateName' => "contents/main/prac_mista.php",] +
                 $this->container->get(Kraje::class)->getVyberKraje($kraj) +
                ['nabidkaPraceVKraji' => $this->container->get(NabidkaPrace::class)->findPodleIdKraje($kraj)];
        break;
        case 'rady_uspesnych':
            $data = ['templateName' => "contents/main/rady_uspesnych.php"] + $this->container->get(RadyUspesnych::class)->getRady();
        break;
//        case 'pribeh':
//            $data =
//                [ 'templateName' => "contents/main/pribeh.php",] +
//                $this->container->get(Pribehy::class)->getPribehStudenta($pribeh) +
//                ['perexyOstatni'=> $this->container->get(Pribehy::class)->findPribehyPerexyOstatni($pribeh)];
//        break;
        case 'pro_firmy':
            $data = [
                'templateName' => "contents/main/pro_firmy.php"] +
                $this->container->get(ProFirmy::class)->getDataProFirmy();
        break;
        case 'uvod':
        default:
            $data = [
                'templateName' => "contents/main/uvod.php",
//                'uvodniSlovo' => $this->container->get(UvodniStranka::class)->getUvodniSlovo(),
                'anotace' => $this->container->get(UvodniStranka::class)->getAnotace(),
                'tematickeOkruhy' => $this->container->get(UvodniStranka::class)->getTematickeOkruhy(),
                'ukazka' => $this->container->get(UvodniStranka::class)->getUkazka(),
                'citat' => $this->container->get(UvodniStranka::class)->getCitat(),
                'kontakt' => $this->container->get(Kontakt::class)->getKontakt(),
                ];
        }

        $template = (new PhpTemplate('contents/layout.php'));

        $view = (new View())->setRenderer(new PhpTemplateRenderer())->setTemplate($template)->setData($data);

        $response = new Response(200);
        $size = $response->getBody()->write($view);
        return $response;
    }

}
