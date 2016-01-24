<?php
/**
 * hook_rdfa_xpath_mappings().
 *
 * Provides RDFa xpath mappings.
 */
function hook_rdfa_xpath_mappings() {
  $node_base = "//*[contains(concat(' ', @class, ' '), ' node-full ')]";
  $rdfa_mappings = array(
    array(
      'type' => 'node',
      'bundle' => 'article',
      'mappings' => array(
        array(
          'xpath' => "//body",
          'attributes' => array(
            'prefix' => 'schema:http://schema.org/',
          ),
        ),
        array(
          'xpath' => "//*[@id = 'page']",
          'attributes' => array(
            'typeof' => 'schema:Article',
          ),
        ),
        array(
          'xpath' => "//h1",
          'attributes' => array(
            'property' => 'schema:headline',
          ),
        ),
        array(
          'xpath' => $node_base . "//*[contains(concat(' ', @class, ' '), ' field-name-field-author ')]",
          'attributes' => array(
            'typeof' => 'schema:Person',
            'property' => 'schema:author',
          ),
        ),
        array(
          'xpath' => $node_base . "//*[contains(concat(' ', @class, ' '), ' field-name-field-author ')]//*[contains(concat(' ', @class, ' '), ' field-item ')]",
          'attributes' => array(
            'property' => 'schema:name',
          ),
        ),
        array(
          'xpath' => $node_base . "//*[contains(concat(' ', @class, ' '), ' field-name-field-published-date ')]//*[contains(concat(' ', @class, ' '), ' date-display-single ')]",
          'attributes' => array(
            'property' => 'schema:datePublished',
            'content' => '[node:field_published_date]'
          ),
        ),
        array(
          'xpath' => $node_base . "//*[contains(concat(' ', @class, ' '), ' primary-image ')]",
          'attributes' => array(
            'property' => 'schema:image',
          ),
        ),
      ),
    ),
  );
  return $rdfa_mappings;
}
