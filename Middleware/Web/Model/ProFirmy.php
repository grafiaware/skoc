<?php
namespace Middleware\Web\Model;


class ProFirmy{
    private $infoProFirmy = [
            [
                "nadpis" => "Pro firmy",
                "podnadpis" => "Zaujměte absolventy dřív než jiné firmy! Získejte ty nejlepší! ",
                "text" => " Ve spolupráci s technickými univerzitami ČVUT a VŠCHT v Praze, ZČU v Plzni, VŠB v Ostravě a VUT Brno vydáváme v roce 2017 již 13. ročník publikace SKOČ! aneb průvodce absolventa VŠ přípravou na reálný život. Během předchozích let jsme přijali mnoho kladných ohlasů z vedení univerzit, od absolventů i samotných podniků - inzerentů.

Máte tak jedinečnou příležitost oslovit své potencionální zaměstnance v publikaci, která se nevyhazuje, ale kterou často čte celá rodina. Nabízíme Vám možnost podílet se na vydávání tohoto průvodce pro studenty posledních ročníků bakalářského, inženýrského a doktorského studia VŠ formou Vaši firemní prezentace = inzerce.

Podpořte svou spolupráci s univerzitami netradiční formou inzerce v publikaci SKOČ. Pamatujte, že zásah více komunikačními kanály funguje nejlépe!

Personální inzerce je možná formou barevného interátu na konci knihy či textu v psané části. Jestliže publikaci naznáte, vyžádejte si ceník či ukázky z knihy."

            ],
        ];

    private $kontakt = "S dotazy nás neváhejte kontaktovat e-mailem na sekretariat@grafia.cz či telefonicky na 377 227 701";

    public  function getInfoProFirmy() {
        return $this->infoProFirmy;
    }

    public function getKontakt() {
        return $this->kontakt;
    }


}

