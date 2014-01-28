<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 cc=80; */

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */


class SolrSearch_SolrSearchFacetTableTest extends SolrSearch_Test_AppTestCase
{

    /**
     * Empty out the facets table.
     * TODO: Why is this necessary?
     *
     * @return void.
     */
    public function setUp()
    {
        parent::setUp();
        foreach ($this->facetsTable->findAll() as $facet) {
            $facet->delete();
        }
    }

    /**
     * groupByElementSet() should return the facets grouped by element set.
     *
     * @return void.
     */
    public function testGroupByElementSet()
    {

        // Get element and element set.
        $element = $this->elementTable->find(1);
        $elementSet = $this->elementSetTable->find(1);

        // Create facet without element_set_id.
        $noElementSetFacet = new SolrSearchFacet;
        $noElementSetFacet->name = 'No Element Set';
        $noElementSetFacet->label = 'No Element Set';
        $noElementSetFacet->save();

        // Create facets with element_set_id.
        $elementSetFacet1 = new SolrSearchFacet;
        $elementSetFacet1->name = 'Element Set 1';
        $elementSetFacet1->label = 'Element Set 1';
        $elementSetFacet1->element_id = $element->id;
        $elementSetFacet1->element_set_id = $elementSet->id;
        $elementSetFacet1->save();
        $elementSetFacet2 = new SolrSearchFacet;
        $elementSetFacet2->name = 'Element Set 2';
        $elementSetFacet2->label = 'Element Set 2';
        $elementSetFacet2->element_id = $element->id;;
        $elementSetFacet2->element_set_id = $elementSet->id;
        $elementSetFacet2->save();

        // Group facets and check formation.
        $groups = $this->facetsTable->groupByElementSet();

        $this->assertEquals(
            $groups[$elementSet->name][1]->id,
            $elementSetFacet1->id
        );

        $this->assertEquals(
            $groups[$elementSet->name][0]->id,
            $elementSetFacet2->id
        );

        $this->assertEquals(
            $groups['Omeka Categories'][0]->id,
            $noElementSetFacet->id
        );

    }

}