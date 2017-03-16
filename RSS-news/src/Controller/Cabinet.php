<?php

namespace App\Controller;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Cabinet
{
    public function getCabinet($request, $response)
    {
        $logged = $request->getSession()->get('logged');
        if ($logged) {
            $response->setContent(include '../templates/cabinet.tpl.php');
        } else {
            $response->setStatusCode('403');
            $response->setContent('Forbidden.');
        }

        return $response;
    }

    public function postSelectedButton($request)
    {
        switch(key($_POST)) {
            case "addNews":
                return new RedirectResponse('/index.php/add_news');
            case "editNews":
                return new RedirectResponse('/index.php/edit_news');
            case "deleteNews":
                return new RedirectResponse('/index.php/delete_news');
        }

        return new RedirectResponse('/index.php/cabinet');
    }
}
