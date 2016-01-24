<?php
/**
 * hook_rdfa_xpath_mappings().
 *
 * Provides RDFa xpath mappings.
 */
function hook_rdfa_xpath_mappings() {
  $node_base = "//*[contains(concat(' ', @class, ' '), ' node-full ')]";
  $rdfa_mappings = array(
    // Global example using the vocab attribute.
    array(
      'type' => 'global',
      'mappings' => array(
        array(
          'xpath' => "//*[contains(concat(' ', @class, ' '), ' logo-wrapper ')]",
          'attributes' => array(
            'vocab' => 'http://schema.org/',
            'typeof' => 'Organization',
          ),
        ),
        array(
          'xpath' => "//a[contains(concat(' ', @class, ' '), ' site-logo ')]",
          'attributes' => array(
            'property' => 'url',
          ),
        ),
        array(
          'xpath' => "//a[contains(concat(' ', @class, ' '), ' site-logo ')]//img",
          'attributes' => array(
            'property' => 'logo',
          ),
        ),
      ),
    ),
    // Node example using a prefix, useful when mixing vocabularies.
    array(
      'type' => 'node',
      'bundle' => 'article',
      'mappings' => array(
        array(
          'xpath' => "//*[@id='page']",
          'attributes' => array(
            'prefix' => 'schema:http://schema.org/',
          ),
        ),
        array(
          'xpath' => "//*[@id='main']",
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
            'content' => '[node:field-published-date]',
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
