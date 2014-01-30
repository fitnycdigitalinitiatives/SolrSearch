<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=80; */

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


class SolrSearchFacetTest_Construct extends SolrSearch_Test_AppTestCase
{


    /**
     * If a parent element is passed, `__construct` set the element reference
     * and the name/label fields.
     */
    public function testElementPassed()
    {

        $title = $this->elementTable->findByElementSetNameAndElementName(
            'Dublin Core', 'Title'
        );

        $facet = new SolrSearchFacet($title);

        // Should set `element_id`, `name`, and `label`.
        $this->assertEquals($title->id, $facet->element_id);
        $this->assertEquals("{$title->id}_s", $facet->name);
        $this->assertEquals('Title', $facet->label);

    }


    /**
     * The element-derived fields should be empty if no element is passed.
     */
    public function testNoElementPassed()
    {

        $facet = new SolrSearchFacet();

        // Should not set `element_id`, `name`, or `label`.
        $this->assertNull($facet->element_id);
        $this->assertNull($facet->name);
        $this->assertNull($facet->label);

    }


}