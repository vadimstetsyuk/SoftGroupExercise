<?php

namespace App\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use App\Model\SourceMapper;
use App\Model\SourceEntity;

use App\Model\UserMapper;

class Cabinet
{
    public static function _before(Request $request, Application $app)
    {
        $logged = $request->getSession()->get('user');
        $mapper = new UserMapper($app['db']);
        if (!$mapper->validate($logged)){
          $app->abort(403, 'Forbidden.');
        }
    }

    public function getIndex(Request $request, Application $app)
    {
        $mapper = new SourceMapper($app['db']);
        $sources = $mapper->getSources();

        $app['view.name'] = 'cabinet';
        return $app['view']->data(['sources' => $sources])->render();
    }

    public function postAddSource(Request $request, Application $app)
    {
        $data = $request->request->all();

        $source = new SourceEntity($data);

        $errors = $app['validator']->validate($source);

        if (count($errors)){
          $error = "";
          foreach ($errors as $error) {
              $error .= $error->getPropertyPath().' '.$error->getMessage()."\n";
          }
          $mapper = new SourceMapper($app['db']);
          $sources = $mapper->getSources();
          $app['view.name'] = 'cabinet';
          return $app['view']->data(['errors' => $error, 'sources' => $sources])->render();
        }

        $mapper = new SourceMapper($app['db']);
        $mapper->save($source);

        return $app->redirect('/cabinet');
    }

    public function postDisableSource(Request $request, Application $app, $id)
    {
        $mapper = new SourceMapper($app['db']);
        $data = $mapper->getSourceById($id);
        $data['is_active'] = ! $data['is_active'];

        $source = new SourceEntity($data);
        $mapper->save($source);

        return $app->redirect('/cabinet');
    }
}
