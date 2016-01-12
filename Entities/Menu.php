<?php namespace Modules\Menu\Entities;

require_once(app_path() . '/../Modules/Core/helpers.php');

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Menu\Traits\MultiSiteTenancyTrait;

class Menu extends Model
{
    use Translatable;
    use MultiSiteTenancyTrait;

    protected $fillable = [
        'name',
        'title',
        'status',
        'primary',
        'site_id'
    ];
    public $translatedAttributes = ['title', 'status'];
    protected $table = 'menu__menus';

    public function menuitems()
    {
        return $this->hasMany('Modules\Menu\Entities\Menuitem')->orderBy('position', 'asc');
    }
}
