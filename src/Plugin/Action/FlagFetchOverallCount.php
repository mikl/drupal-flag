<?php

/**
 * @file
 * Contains \Drupal\flag\Plugin\Action\FlagFetchOverallCount.
 */

namespace Drupal\flag\Plugin\Action;

use Drupal\rules\Core\RulesActionBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Entity\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Fetch overall flag count' action.
 *
 * @Action(
 *   id = "rules_flag_fetch_overall_count",
 *   label = @Translation("Fetch overall flag count"),
 *   category = @Translation("Flag"),
 *   context = {
 *     "flag" = @ContextDefinition("entity:flag",
 *       label = @Translation("Flag"),
 *       description = @Translation("The flag we need the count for.")
 *     ),
 *   },
 *   provides = {
 *     "flag_count" = @ContextDefinition("integer",
 *       label = @Translation("Flag count")
 *     )
 *   }
 * )
 */
class FlagFetchOverallCount extends RulesActionBase {

  /**
   * {@inheritdoc}
   */
  public function summary() {
    return $this->t('Fetch overall flag count');
  }

  /**
   * {@inheritdoc}
   */
  public function execute() {
    $flag = $this->getContextValue('flag');
    // Let's wait until https://www.drupal.org/node/2467413 is in.
    $flag_count = 0;
    $this->setProvidedValue('flag_count', $flag_count);
  }
}
