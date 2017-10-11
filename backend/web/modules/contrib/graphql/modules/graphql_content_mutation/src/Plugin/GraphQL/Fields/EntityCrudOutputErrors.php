<?php

namespace Drupal\graphql_content_mutation\Plugin\GraphQL\Fields;

use Drupal\graphql_content_mutation\Plugin\GraphQL\EntityCrudOutputWrapper;
use Drupal\graphql_core\GraphQL\FieldPluginBase;
use Youshido\GraphQL\Execution\ResolveInfo;

/**
 * Retrieve a list of error messages.
 *
 * @GraphQLField(
 *   id = "entity_crud_output_errors",
 *   secure = true,
 *   name = "errors",
 *   type = "String",
 *   types = {"EntityCrudOutput"},
 *   multi = true,
 *   nullable = false
 * )
 */
class EntityCrudOutputErrors extends FieldPluginBase {

  /**
   * {@inheritdoc}
   */
  public function resolveValues($value, array $args, ResolveInfo $info) {
    if ($value instanceof EntityCrudOutputWrapper) {
      if ($errors = $value->getErrors()) {
        foreach ($errors as $error) {
          yield $error;
        }
      }
    }
  }

}
