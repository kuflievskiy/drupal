<?php
/**
 * @file
 * Contains \Drupal\mymodule\Controller\APIController.
 */

namespace Drupal\mymodule\Controller;

use Drupal\mymodule\Model\MyModuleModel;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class APIController extends ControllerBase implements ContainerInjectionInterface {

  protected $dbConnection;

  public function __construct($database) {
    $this->dbConnection = $database;
  }

  /**
   * https://www.drupal.org/docs/8/api/services-and-dependency-injection/services-and-dependency-injection-in-drupal-8
   * */
  public static function create(ContainerInterface $container) {
    return new static($container->get('database'));
  }

  /**
   * @param $request
   *
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function aggregate(Request $request) {

    $format = $request->get('format');

    if ('json' !== $format) {
      return new JsonResponse([], 400);
    }

    $response['results'] = (new MyModuleModel($this->dbConnection))->get();

    return new JsonResponse($response, 200);
  }
}
