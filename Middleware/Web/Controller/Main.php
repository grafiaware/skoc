<?php
namespace Middleware\Web\Controller;

use Psr\Http\Message\ServerRequestInterface;

use Pes\Http\Response;
use Pes\Http\Request\RequestParams;
use Pes\View\View;
use Pes\View\CompositeView;
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
        $mainName = $requestParams->getParam($request, 'main', 'uvod');  // default uvod;
        //$pribeh = $requestParams->getParam($request, 'pribeh', '');  // druhý parametr je default hodnota
        $kraj = $requestParams->getParam($request, 'kraj', '');

        switch ($mainName) {
//        case 'ohlasy_ctenaru':
//            $template = "contents/main/ohlasy_ctenaru.php";
//            $data = $this->container->get(OhlasyCtenaru::class)->getOdpovedi();
//        break;
        case 'kontakt':
            $template = "contents/main/kontakt.php";
            $data = [
                'nadpisSekce' => $this->container->get(Kontakt::class)->getNadpisSekce(),
                'dataSekce' => $this->container->get(Kontakt::class)->getDataSekce(),
                'tymGrafia' => $this->container->get(Kontakt::class)->getTymGrafia()];
        break;
        case 'prac_mista':
            $template = "contents/main/prac_mista.php";
            $data = [
                'nadpisSekce' => $this->container->get(Kraje::class)->getNadpisSekce(),
                'vyberKraje' => $this->container->get(Kraje::class)->getVyberKraje($kraj),
                'nabidkaPraceVKraji' => $this->container->get(NabidkaPrace::class)->findPodleIdKraje($kraj)];
        break;
        case 'rady_uspesnych':
            $template = "contents/main/rady_uspesnych.php";
            $data = [
                'nadpisSekce' => $this->container->get(RadyUspesnych::class)->getNadpisSekce(),
                'popisSekce' => $this->container->get(RadyUspesnych::class)->getPopisSekce(),
                'rady' => $this->container->get(RadyUspesnych::class)->getRady()];
        break;
        case 'pro_firmy':
            $template = "contents/main/pro_firmy.php";
            $data = [
                'infoProFirmy' => $this->container->get(ProFirmy::class)->getInfoProFirmy(),
                'kontakt' => $this->container->get(ProFirmy::class)->getKontakt()];
        break;
        case 'uvod':
        default:
            $template = "contents/main/uvod.php";
            $data = [
//                'uvodniSlovo' => $this->container->get(UvodniStranka::class)->getUvodniSlovo(),
                'anotace' => $this->container->get(UvodniStranka::class)->getAnotace(),
                'tematickeOkruhy' => $this->container->get(UvodniStranka::class)->getTematickeOkruhy(),
                'ukazka' => $this->container->get(UvodniStranka::class)->getUkazka(),
                'citat' => $this->container->get(UvodniStranka::class)->getCitat(),
                'kontakt' => [
                        'nadpisSekce' => $this->container->get(Kontakt::class)->getNadpisSekce(),
                        'dataSekce' => $this->container->get(Kontakt::class)->getDataSekce(),
                        'tymGrafia' => $this->container->get(Kontakt::class)->getTymGrafia()],
                ];
        }

        $view = new View();
        $view->setRenderer(new PhpTemplateRenderer());
        $view->setTemplate(new PhpTemplate($template));
        $view->setData($data);

        $compositeView = new CompositeView();
        $compositeView->setRenderer(new PhpTemplateRenderer());
        $compositeView->setTemplate(new PhpTemplate('contents/layout.php'));

        $compositeView->appendComponentView($view, 'main');

        $response = new Response(200);
        $size = $response->getBody()->write($compositeView->getString());
        return $response;
    }

}
