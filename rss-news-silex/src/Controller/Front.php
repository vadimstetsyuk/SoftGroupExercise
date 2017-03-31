<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

use App\Model\NewsMapper;
use App\Model\NewsEntity;

use App\Model\UserEntity;
use App\Model\UserMapper;

class Front
{
    public function getIndex(Request $request, Application $app)
    {
        $mapper = new NewsMapper($app['db']);
        $items = $mapper->getNews();

        $logged = $request->getSession()->get('logged');

        $app['view.name'] = 'index';
        return $app['view']->data(['items' => $items, 'logged' => $logged])->render();
        // return include '../templates/index.tpl.php';
    }

    public function getLogin(Request $request, Application $app)
    {
        $app['view.name'] = 'login';
        return $app['view']->render();
    }

    public function postLogin(Request $request, Application $app)
    {
        $session = $request->getSession();

        $user = $request->request->all();
        $userEntity = new UserEntity($user);
        $mapper = new UserMapper($app['db']);

        $errors = $app['validator']->validate($userEntity);
        if (count($errors) > 0) {
            $error = "";
            foreach ($errors as $error) {
                $error .= $error->getPropertyPath().' '.$error->getMessage()."\n";
            }
            $app['view.name'] = 'login';
            return $app['view']->data(['errors' => $error])->render();
        } else {
          if (!$mapper->validate($userEntity)){
            $app['view.name'] = 'login';
            return $app['view']->data(['errors' => 'Undefined user'])->render();
          }
          $session->set('user', $userEntity);
          return $app->redirect('/cabinet');
        }
    }

    public function getLogout(Request $request, Application $app)
    {
        $session = $request->getSession();
        $session->clear();
        $session->invalidate();

        return $app->redirect('/');
    }
}
