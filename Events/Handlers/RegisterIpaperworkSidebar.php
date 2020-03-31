<?php

namespace Modules\Ipaperwork\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterIpaperworkSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('ipaperwork::common.ipaperwork'), function (Item $item) {
                $item->icon('fa fa-address-card-o');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('ipaperwork::paperworks.title.paperworks'), function (Item $item) {
                    $item->icon('fa fa-newspaper-o');
                    $item->weight(0);
                    $item->append('admin.ipaperwork.paperwork.create');
                    $item->route('admin.ipaperwork.paperwork.index');
                    $item->authorize(
                        $this->auth->hasAccess('ipaperwork.paperworks.index')
                    );
                });

                $item->item(trans('ipaperwork::companies.title.companies'), function (Item $item) {
                    $item->icon('fa fa-bookmark-o');
                    $item->weight(0);
                    $item->append('admin.ipaperwork.company.create');
                    $item->route('admin.ipaperwork.company.index');
                    $item->authorize(
                        $this->auth->hasAccess('ipaperwork.companies.index')
                    );
                });
               
                $item->item(trans('ipaperwork::userpaperworks.title.userpaperworks'), function (Item $item) {
                    $item->icon('fa fa-address-card-o');
                    $item->weight(0);
                    $item->append('admin.ipaperwork.userpaperwork.create');
                    $item->route('admin.ipaperwork.userpaperwork.index');
                    $item->authorize(
                        $this->auth->hasAccess('ipaperwork.userpaperworks.index')
                    );
                });
                
                /*
                $item->item(trans('ipaperwork::userpaperworkhistories.title.userpaperworkhistories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.ipaperwork.userpaperworkhistory.create');
                    $item->route('admin.ipaperwork.userpaperworkhistory.index');
                    $item->authorize(
                        $this->auth->hasAccess('ipaperwork.userpaperworkhistories.index')
                    );
                });
                */
               
// append




            });
        });

        return $menu;
    }
}
