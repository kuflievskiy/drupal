<?php
/**
 * @file
 * Contains \Drupal\mymodule\Model\MyModuleModel.
 */

namespace Drupal\mymodule\Model;

use Drupal\Core\Database\Connection;

/**
 * Class MyModuleModel
 *
 * */
class MyModuleModel {

  protected $connection;

  /**
   * {@inheritdoc}
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  public function get() {

    //$query = \Drupal::database()->select('node_field_data', 'nfd');
    $query = $this->connection->select('node_field_data', 'nfd');
    $query->fields('nfd', ['nid', 'title', 'status', 'created', 'changed']);
    $query->condition('nfd.type', 'article');
    //$query->condition('nfd.status', '1');

    // "images"
    $query->addExpression('
      ( SELECT GROUP_CONCAT(file_managed.uri separator \'|\') AS images
        FROM
        {node__field_image} field_image
        INNER JOIN {file_managed} file_managed ON file_managed.fid = field_image.field_image_target_id AND file_managed.filemime IN (\'image/png\',\'image/jpeg\',\'image/gif\')
        WHERE field_image.entity_id = nfd.nid
        )
        ', 'images'
    );

    // body
    $query->addField('node__body', 'body_value', 'description');
    $query->leftJoin('node__body', 'node__body', 'node__body.entity_id = nfd.nid');

    $query->orderBy('nfd.title', 'asc');

    return $query->execute()->fetchAll();

  }

  /**
   * This method is used to reverse array.
   */
  public function test( $testData ) {
    return array_reverse($testData);
  }
}
