<?php

namespace statik\intgin\controller;

use ride\library\orm\OrmManager;

use ride\web\base\controller\AbstractController;
use ride\web\cms\orm\ContentService;

class ApiController extends AbstractController {

    public function ginSearchAction(OrmManager $orm, ContentService $contentService, $locale) {
        $ginModel = $orm->getGinModel();

        $query = $this->request->getQueryParameter('query');

        $result = array();
        $gins = $ginModel->searchGin($query, $locale);

        foreach ($gins as $gin) {
            $content = $contentService->getContentForEntry($ginModel, $gin, 'ginrepublic', $locale);

            $result[$gin->getTitle() . '-Gin-' . $gin->getId()] = array(
                'name' => $content->title,
                'url' => $content->url,
                'type' => $content->type,
            );
        }

        ksort($result);

        $this->setJsonView($result);
    }

}
