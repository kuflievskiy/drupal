<?php
namespace Drupal\Tests\mymodule\Unit;

use Drupal\Core\DependencyInjection\ContainerBuilder;

use Drupal\mymodule\Model\MyModuleModel;
use Drupal\Tests\UnitTestCase;

/**
 * Tests generation of mymodule.
 *
 *
 * Required PHPDoc metadata for test discoverability
 * @link https://www.drupal.org/docs/8/phpunit/phpunit-file-structure-namespace-and-required-metadata
 *
 * @group mymodule
 * @coversDefaultClass \Drupal\mymodule\Model\MyModuleModel
 */
class MyModuleModelTest extends UnitTestCase {


  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();


    $this->container = new ContainerBuilder();

    \Drupal::setContainer($this->container);

    $connection = $this->prophesize('Drupal\Core\Database\Connection');

    $this->stub = $this->getMockBuilder('Drupal\mymodule\Model\MyModuleModel')
      ->setConstructorArgs([
        $connection->reveal()
      ])
      //->disableOriginalConstructor()
      //->setMethods(null)
      ->getMock();

    $this->stub->expects($this->any())->method('get')
      ->will($this->returnValue(
        [
          "nid" => "46",
          "title" => "Abigo Quadrum Vulputate",
          "status" => "1",
          "created" => "1520360983",
          "changed" => "1520773720",
          "description" => "Antehabeo huic te velit. Consequat distineo dolore mauris pneum. At eligo oppeto. Esse ideo pala sagaciter. Capto commoveo ea pertineo praesent. Nobis odio plaga. Capto esca feugiat iusto jugis nimis oppeto ratis vindico. Amet commodo consequat damnum duis humo roto. Eligo quidne roto. Esca exputo gravis obruo occuro sudo. Antehabeo caecus haero letalis loquor macto os premo valetudo.\n\nAbigo brevitas facilisi gemino te voco. Defui duis pagus quae singularis uxor. Bene capto decet et eum exerci iustum probo refero utinam. Abigo cogo immitto inhibeo iriure nibh nobis olim.\n\nAptent iustum jumentum nimis pala saepius sed. Caecus cui turpis valde voco. Comis diam jugis pertineo plaga. Abbas abigo camur erat iustum pagus pneum quia roto. Causa decet dolore vereor volutpat. Distineo duis immitto oppeto quibus tum ulciscor uxor verto.\n\nBrevitas dignissim exerci ludus populus probo usitas. Humo iusto neo typicus voco. Abdo duis nobis pagus refoveo sit suscipere typicus volutpat. Erat esse gravis humo importunus ludus melior pala rusticus. Fere mos nibh oppeto. Acsi eligo mauris sagaciter tation. Fere quidem tation. Lenis letalis lobortis torqueo.\n\nAt conventio defui dignissim hendrerit lenis molior ulciscor. Eligo iusto jus lobortis nimis sed veniam. Abigo aliquip antehabeo ille pecus quae quidne roto. Augue dolor huic jugis luptatum mauris proprius roto ut.\n\nAbdo abico augue defui luctus pneum saepius venio volutpat vulputate. Esca macto pecus saepius. Antehabeo feugiat tamen. Fere te turpis zelus. Adipiscing esca velit voco. Abluo aliquam dignissim dolore et facilisis haero luctus verto vicis. Ea erat luptatum metuo pala similis utrum. Diam ex importunus nibh pagus paratus pertineo saluto suscipere. Bene duis iriure jus metuo pagus refero singularis ulciscor volutpat.\n\nAt camur dolor ideo inhibeo metuo quidne. Caecus capto dolore hos imputo jumentum jus proprius ut. Abdo acsi elit laoreet odio pneum secundum sit vulpes. Appellatio at gilvus ille jumentum nobis odio tum. Autem hendrerit modo nulla secundum singularis tamen voco. Caecus damnum ea euismod iriure jus oppeto uxor validus. Amet defui distineo euismod eum metuo tego.\n\nAmet augue commoveo eros feugiat tincidunt. Appellatio commoveo hendrerit jugis saluto tamen te vicis ymo. Cui dolor dolore exputo huic importunus pala wisi. Cogo letalis lucidus mauris nobis quadrum suscipit turpis. Comis immitto pagus. Comis conventio eu laoreet ulciscor ymo.\n\nBlandit duis et ex fere neo odio plaga quae vereor. Abdo imputo os tum. Autem mos similis. Ea lenis modo nunc qui similis sit tum.\n\nCui gilvus iriure nimis. Distineo ex hendrerit metuo modo qui torqueo virtus. Abigo ad exerci ludus metuo quis sagaciter uxor ymo. Esca gravis iaceo nulla ulciscor. Commoveo populus rusticus sino sit sudo vereor vicis. Consectetuer consequat exputo haero illum jugis luptatum plaga.\n\nLuptatum neque quia quibus rusticus sagaciter sudo zelus. Aliquip consectetuer gravis incassum jugis proprius quibus suscipere. Hendrerit luctus nunc. Brevitas damnum ibidem verto.\n\nNatu pecus roto. Feugiat molior te. Blandit eum luptatum nisl praesent premo tincidunt. Jumentum magna nimis plaga. Abigo huic jus letalis molior nisl similis te vulpes. Dolor esca usitas vereor.\n\n",
          "images" => "public:\/\/2018-03\/generateImage_zjrwWd.gif"
        ]
      ));
  }

  public function testGet() {
    $items = $this->stub->get();
    $this->assertTrue( is_array( $items ) );
  }

}
