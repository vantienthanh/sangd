<?php

namespace Modules\Profile\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterProfileSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
//            $group->item(trans('profile::profiles.title.profiles'), function (Item $item) {
//                $item->icon('fa fa-copy');
//                $item->weight(10);
//                $item->authorize(
//                     /* append */
//                );
//                $item->item(trans('profile::frontendusers.title.frontendusers'), function (Item $item) {
//                    $item->icon('fa fa-copy');
//                    $item->weight(0);
//                    $item->append('admin.profile.frontenduser.create');
//                    $item->route('admin.profile.frontenduser.index');
//                    $item->authorize(
//                        $this->auth->hasAccess('profile.frontendusers.index')
//                    );
//                });
//                $item->item(trans('profile::frontenduserinfos.title.frontenduserinfos'), function (Item $item) {
//                    $item->icon('fa fa-copy');
//                    $item->weight(0);
//                    $item->append('admin.profile.frontenduserinfo.create');
//                    $item->route('admin.profile.frontenduserinfo.index');
//                    $item->authorize(
//                        $this->auth->hasAccess('profile.frontenduserinfos.index')
//                    );
//                });
//// append
//
//
//            });
        });

        return $menu;
    }
}
