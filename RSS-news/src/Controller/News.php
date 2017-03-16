<?php

namespace App\Controller;

use \PDO;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class News
{
    public function getAddPage($request, $response)
    {
        $logged = $request->getSession()->get('logged');
        if ($logged) {
            $response->setContent(include '../templates/add-news.tpl.php');
        } else {
            $this->Log('error_log');
            $response->setStatusCode('403');
            $response->setContent('Forbidden.');
        }

        return $response;
    }

    public function getEditPage($request, $response)
    {
        $logged = $request->getSession()->get('logged');
        if ($logged) {
            $db = new PDO("mysql:host=localhost;dbname=rss_news;charset=utf8", "root", "");
            $sql = "SELECT * FROM news";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $response->setContent(include '../templates/edit-news.tpl.php');
        } else {
            $this->Log('error_log');
            $response->setStatusCode('403');
            $response->setContent('Forbidden.');
        }

        return $response;
    }

    public function getDeletePage($request, $response)
    {
        $logged = $request->getSession()->get('logged');
        if ($logged) {
            $db = new PDO("mysql:host=localhost;dbname=rss_news;charset=utf8", "root", "");
            $sql = "SELECT * FROM news";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $response->setContent(include '../templates/delete-news.tpl.php');
        } else {
            $this->Log('error_log');
            $response->setStatusCode('403');
            $response->setContent('Forbidden.');
        }

        return $response;
    }


    public function postNews($request)
    {
        $title = $request->request->get('title');
        $link = $request->request->get('link');
        $description = $request->request->get('description');
        $source = $request->request->get('source');
        $pub_date = date("Y-m-d H:i:s");

        $db = new PDO("mysql:host=localhost;dbname=rss_news;charset=utf8", "root", "");
        $sql = "INSERT IGNORE INTO news (title, link, description, source, pub_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);

        $stmt->execute([
            $title,
            $link,
            $description,
            $source,
            $pub_date,
        ]);

        if(stmt) {
            $this->Log('info_log');
            echo '<script language="javascript">alert("Post added successfully")</script>';
        } else {
            $this->Log('error_log');
        }

        return new RedirectResponse('/index.php/cabinet.php');
    }

    public function putNews($request)
    {
        $id = key($_POST);

        $title = $request->request->get('title');
        $link = $request->request->get('link');
        $description = $request->request->get('description');
        $source = $request->request->get('source');
        $pub_date = date("Y-m-d H:i:s");

        $db = new PDO("mysql:host=localhost;dbname=rss_news;charset=utf8", "root", "");
        $sql = "UPDATE news SET title=$title, link=$link description=$description source=$source WHERE id=$id";
        $stmt = $db->prepare($sql);

        $stmt->execute();

        if(stmt) {
            $this->Log('info_log');
            echo '<script language="javascript">alert("Post edited successfully")</script>';
        } else {
            $this->Log('error_log');
        }

        return new RedirectResponse('/index.php/cabinet.php');
    }

    public function deleteNews($request)
    {
        $id = key($_POST);

        $db = new PDO("mysql:host=localhost;dbname=rss_news;charset=utf8", "root", "");
        $sql = "DELETE FROM news WHERE id=$id";
        $stmt = $db->prepare($sql);

        $stmt->execute();

        if(stmt) {
            $this->Log('info_log');
            echo '<script language="javascript">alert("Post deleted successfully")</script>';
        } else {
            $this->Log('error_log');
        }

        return new RedirectResponse('/index.php/cabinet.php');
    }

    private function Log($message)
    {
        $logger = new Logger($message);
        switch ($message) {
            case 'info_log':
                $logger->pushHandler(new StreamHandler('log/success_task.log', Logger::INFO));
                $logger->info(date("Y-m-d H:i:s") . " - task was executed");
                break;
            case 'error_log':
                $logger->pushHandler(new StreamHandler('log/error_task.log', Logger::ERROR));
                $logger->error(date("Y-m-d H:i:s") . " - something wrong");
                break;
        }
    }
}
