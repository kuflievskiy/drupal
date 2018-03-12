<?php

/**
 * @file
 * Contains \Drupal\api\Controller\FeedController.
 */

namespace Drupal\mymodule\Controller;

use Drupal\mymodule\Model\MyModuleModel;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedController extends ControllerBase {

  /**
   * @param $request
   *
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function v2(Request $request) {

    $response = new Response();
    $response->headers->set('Content-Type', 'xml');

    $responseHeader = '<?xml version="1.0" encoding="UTF-8"?>
      <feed>
        <title>Test MyModule API</title>
        <link>http://www.test.test</link>
        <description>This is the test api response</description>
        <version>1.0</version>';

    $responseFooter = '</feed>';

    $path = drupal_get_path('module', 'mymodule') . '/api';
    $templatePath = $path . '/templates/api/feed.php';

    //$items = (new MyModuleModel())->get();

    // @todo: implement rendering in the template
    ob_start();
    include $templatePath;
    $responseBody = ob_get_contents();
    ob_end_clean();

    $response->setContent($responseHeader . $responseBody . $responseFooter);

    return $response;
  }
}
