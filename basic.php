// Load entity.
$entity = \Drupal::entityTypeManager()->getStorage('entity_type')->load($entity_id);

// Entity field value.
$entity->field_name->value;
$entity->field_name->getValue();

// Get term vocab.
$term->getVocabularyId();

// Redirect.
$response = new \Symfony\Component\HttpFoundation\RedirectResponse('/node/' . $nid);
$response->send();

// Entity query.
$query = \Drupal::entityQuery('node')
      ->condition('status', 1)
      ->condition('field_product_catalog.entity.tid', $variables['term']->id());
$nids = $query->execute();
