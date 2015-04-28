<?php

namespace intgin\model;

use ride\library\orm\model\GenericModel;

class GinModel extends GenericModel {

    public function searchGin($query, $locale) {
        $query = trim($query);
        if (!$query) {
            return array();
        }

        $queryWildcard = '%' . $query . '%';

        $query = $this->createQuery($locale);
        $query->addCondition('{title} LIKE %1%', $queryWildcard);
        // $query->addCondition('{title} LIKE %1% OR {body} LIKE %1%', $queryWildcard);
        $query->setLimit(10);

        return $query->query();
    }
}
