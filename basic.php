<?php
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

// Clean class name.
$class = \Drupal\Component\Utility\Html::cleanCssIdentifier($string);

// Image load & style.
$image_uri = $entity->field_image->entity->getFileUri();
$image = \Drupal\image\Entity\ImageStyle::load('large')->buildUrl($image_uri);

// Internal link (fromUri).
use Drupal\Core\Link;
use Drupal\Core\Url;
$options = array(
  'query'      => ['type' => 'article', 'status' => 1],
  'fragment'   => 'article-list',
  'attributes' => ['class' => ['btn', 'btn-mini']],
  'absolute'   => TRUE,
);
$link = Link::fromTextAndUrl(t('Click here'), Url::fromUri('internal:/node', $options))->toString();
// <a href="http://www.mywebsite.com/node?type=article&status=1#article-list" class="btn btn-mini">Click here</a>

// Internal link (fromRoute).
use Drupal\Core\Link;
use Drupal\Core\Url;
$query = array(
  'status'   => 1,
  'type'     => 'All',
  'title'    => 'article',
  'langcode' => 'All',
);
$options = array(
  'fragment'   => 'edit-modules-field-types',
  'attributes' => ['class' => ['btn', 'btn-mini']],
  'absolute'   => TRUE,
);
$link = Link::fromTextAndUrl(t('Click here'), Url::fromRoute('system.admin_content', $query, $options))->toString();
// <a href="http://www.mywebsite.com/admin/content?status=1&type=article&title=&langcode=All#view-title-table-column" class="btn btn-mini">Click here</a>
