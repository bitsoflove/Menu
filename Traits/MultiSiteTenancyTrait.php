<?php namespace Modules\Menu\Traits;

use Modules\Site\Facades\SiteGateway;
use \Site;

trait MultiSiteTenancyTrait {

    public function newQuery()
    {
        $query = parent::newQuery();
        if(array_key_exists('Site', app('modules')->enabled())) {
            $this->appendWhereClause($query);
        }

        return $query;
    }

    private function appendWhereClause($query) {
      $siteId = Site::id();
      if(!empty($siteId)) {
          $query->where('site_id', '=', $siteId);
      }
    }
}
