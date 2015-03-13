<?php

namespace Html2Mail;

use \Wa72\HtmlPageDom\HtmlPage;

class Client extends HtmlPage
{
    public function setBody($body)
    {
        parent::__construct($body);
    }

    public function premailer()
    {
        $style = $this->filter('style');
        $styleText = preg_replace('/\<\/?style\>/','',$style);
        $style->remove();

        preg_match_all('/(?P<regra>(?P<name>[a-z.-_\[\] ]+)([ \n\t\s])*\{(?P<regras>[a-zA-Z0-9\:\;\!\#\-_\'\, \n\s\t]*)\})+/', $styleText, $styles);

        $key = 0;

        foreach($styles['name'] as &$style) {
            $style = preg_replace('/^( )+/','', $style);

            $doom = $this->filter($style);

            try {
                @$currentStyle = $doom->getAttribute('style');
            } catch(\InvalidArgumentException $e) {
                $currentStyle = '';
            }
            $currentStyle .= preg_replace('/[\n\t\s]*/','', $styles['regras'][$key]);

            $doom->setAttribute('style', $currentStyle);
            $key++;
        }
    }
}