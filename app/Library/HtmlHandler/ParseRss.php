<?php

namespace App\Library\HtmlHandler;

use League\Pipeline\StageInterface;
use SimpleXMLElement;
use Twig\TwigFunction;
use Twig\Loader\ArrayLoader;
use Twig\Environment;

use function Acelle\Helpers\xml_to_array;
use function Acelle\Helpers\url_get_contents_ssl_safe;

class ParseRss implements StageInterface
{
    public function __invoke($html)
    {
        $rss = new TwigFunction('rss', function ($url, $count = 10) {
            $dom = simplexml_load_string(url_get_contents_ssl_safe($url), 'SimpleXMLElement', LIBXML_NOCDATA);
            $x = xml_to_array($dom);
            $x = ($x['rss']['channel']);
            $x['item'] = array_slice($x['item'], 0, $count);
            return $x;
        });

        $loader = new ArrayLoader([
            'content' => $html,
        ]);

        $twig = new Environment($loader);
        $twig->addFunction($rss);

        return $twig->render('content');
    }
}
