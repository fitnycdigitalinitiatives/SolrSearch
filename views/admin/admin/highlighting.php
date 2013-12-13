<?php

/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 cc=80; */

/**
 * @package     omeka
 * @subpackage  fedora-connector
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php echo head(array(
  'title' => __('Solr Search Hit Highlighting Options')
)); ?>

<ul id="section-nav" class="navigation">
    <li>
      <a href="<?php echo html_escape(url('solr-search/fields')); ?>">
        <?php echo __('Field Configuration') ?>
      </a>
    </li>
    <li class="current">
      <a href="<?php echo html_escape(url('solr-search/highlighting')); ?>">
        <?php echo __('Hit Highlighting Options') ?>
      </a>
    </li>
    <li>
      <a href="<?php echo html_escape(url('solr-search/reindex')); ?>">
        <?php echo __('Index Items') ?>
      </a>
    </li>
</ul>

<div id="primary">
  <h2><?php echo __('Hit Highlighting Options') ?></h2>
	<?php echo flash(); ?>
	<?php echo $form; ?>
</div>

<?php echo foot(); ?>