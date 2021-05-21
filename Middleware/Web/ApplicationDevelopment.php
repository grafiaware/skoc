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
use Model\ProFirmy;
use Model\RadyUspesnych;
use Model\Kraje;
use Model\NabidkaPrace;
use Model\Kontakt;

use Pes\View\Renderer\Container\TemplateRendererContainer;

use Pes\View\Recorder\RecorderProvider;
use Pes\View\Recorder\VariablesUsageRecorder;
use Pes\View\Recorder\RecordsLogger;

class ApplicationDevelopment implements MiddlewareInterface {
    /**
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return Response
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler=NULL): ResponseInterface {

        $logger = FileLogger::getInstance('Logs', 'ApplicationLogger.log', FileLogger::APPEND_TO_LOG);

        $modelContainer = (new ContextContainerConfigurator())->configure(new Container());
        #### template, renderer se záznamem, view a renderování výstupu ####
        // Příprava na logování
        //
        // Pro logování musí každý nový Renderer dostat jako parametr konstruktoru RecorderProvider.
        // RecorderProvider poskytuje Rekordery pro záznam užití proměnných při renderování a každý poskytnutý Recorder zaregistruje.
        // Prostřednictím RecorderProvideru jsou pak zpětně všechny poskytnuté Recordery dostupné.
        // V této aplikaci jsou všechny renderery vytváženy automaticky. Pro vytváření Rendererů použit RendererContainer.
        // RecorderProvider je nastaven RendereContaineru jako statická proměnná metodou setRecorderProvider a
        // poskytuje nový Rekorder vždy, když RendererContainer vytváří nový Renderer.
        // Po skončení renderování se RecorderProvider předá do RecordsLoggeru pro logování užití proměnných v šablonách. V RecordsLoggeru
        // jsou všechny RecorderProviderem poskytnuté a zaregistrované Rekordery přečteny a je pořízen log.
        $recorderProvider = new RecorderProvider(VariablesUsageRecorder::RECORD_LEVEL_FULL);
        $rendererContainer = new TemplateRendererContainer();
        $rendererContainer->setRecorderProvider($recorderProvider);

        $requestParams = new RequestParams();
        $mainTemplate = $requestParams->getParam($request, 'main', 'uvod');  // default uvod;
        //$pribeh = $requestParams->getParam($request, 'pribeh', '');  // druhý parametr je default hodnota
        $kraj = $requestParams->getParam($request, 'kraj', '');

        switch ($mainTemplate) {
//        case 'ohlasy_ctenaru':
//            $data = ['templateName' => "contents/main/ohlasy_ctenaru.php"] + $modelContainer->get(OhlasyCtenaru::class)->getOdpovedi();
//        break;
        case 'kontakt':
            $data = ['templateName' => "contents/main/kontakt.php"] + $modelContainer->get(Kontakt::class)->getKontakt();
        break;
        case 'prac_mista':
            $data =
                ['templateName' => "contents/main/prac_mista.php",] +
                 $modelContainer->get(Kraje::class)->getVyberKraje($kraj) +
                ['nabidkaPraceVKraji' => $modelContainer->get(NabidkaPrace::class)->findPodleIdKraje($kraj)];
        break;
        case 'rady_uspesnych':
            $data = ['templateName' => "contents/main/rady_uspesnych.php"] + $modelContainer->get(RadyUspesnych::class)->getRady();
        break;
//        case 'pribeh':
//            $data =
//                [ 'templateName' => "contents/main/pribeh.php",] +
//                $modelContainer->get(Pribehy::class)->getPribehStudenta($pribeh) +
//                ['perexyOstatni'=> $modelContainer->get(Pribehy::class)->findPribehyPerexyOstatni($pribeh)];
//        break;
        case 'pro_firmy':
            $data = [
                'templateName' => "contents/main/pro_firmy.php"] +
                $modelContainer->get(ProFirmy::class)->getDataProFirmy();
        break;
        case 'uvod':
        default:
            $data = [
                'templateName' => "contents/main/uvod.php",
//                'uvodniSlovo' => $modelContainer->get(UvodniStranka::class)->getUvodniSlovo(),
                'anotace' => $modelContainer->get(UvodniStranka::class)->getAnotace(),
                'tematickeOkruhy' => $modelContainer->get(UvodniStranka::class)->getTematickeOkruhy(),
                'ukazka' => $modelContainer->get(UvodniStranka::class)->getUkazka(),
                'citat' => $modelContainer->get(UvodniStranka::class)->getCitat(),
                'kontakt' => $modelContainer->get(Kontakt::class)->getKontakt(),
                ];
        }

        $layoutData = ['mainAttributes' => ['class'=>$mainTemplate]];
        //logování
        // Je třeba nastavit libovolný běžný logger jako parametr RecordsLoggeru.
        // Zde je jako běžný logger použit FileLogger a log tedy bude zapsán v příslušném souboru.
        // RecordsLogger získá data z recorderů a zapíše log.
        $logger = FileLogger::getInstance('Logs', 'ViewLogger.log', FileLogger::REWRITE_LOG);
        (new RecordsLogger($logger))->logRecords($recorderProvider);

        $template = (new PhpTemplate('contents/layout.php'));

        $view = (new View())->setRenderer(new PhpTemplateRenderer())->setTemplate($template)->setData($layoutData + $data);

        $response = new Response(200);
        $size = $response->getBody()->write($view->getString());
        return $response;
    }

}