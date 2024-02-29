<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\MenuDataTable;
use App\DataTables\SubmenuDataTable;
use App\DataTables\MenuPageDataTable;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\MenuPage;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    # --------------menu section----------------------#
    public function menuList(MenuDataTable $dataTable)
    {
        return $dataTable->render('admin.menu.list');
    }

    public function menuAdd(Request $request)
    {
        if ($request->menu_id) {
            $menu = Menu::where('id', $request->menu_id)->first();
        } else {
            $menu = new Menu();
        }

        // $menu->en_name = $request->en_name;
        $menu->ja_name = $request->ja_name;
        $menu->en_desc = $request->en_desc;
        $menu->ja_desc = $request->ja_desc;
        $menu->icon = $request->icon ?: NULL;

        // Handle the icon upload
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('public/icons');
            $menu->icon = basename($iconPath);
        }
        
        $menu->save();

        return [
            'status' => true
        ];
    }

    public function menuChangeStatus(Request $request)
    {
        $menu = Menu::where('id', $request->id)->first();
        if ($menu) {
            $menu->status = $request->status;
            $menu->save();

            $menu->subMenu()->update([
                'status' => $request->status,
            ]);

            $menu->menuPage()->update([
                'status' => $request->status,
            ]);
            return true;
        }
        return false;
    }

    public function menuGet(Request $request)
    {
        return Menu::where('id', $request->menu_id)->first();
    }

    # --------------sub menu section----------------------#

    public function subMenuList(SubmenuDataTable $dataTable)
    {
        $menu = Menu::where('status', 1)/* ->where('name', '!=', 'Home') */->get();

        return $dataTable->render('admin.sub_menu.list', compact('menu'));
    }

    public function subMenuGet(Request $request)
    {
        return SubMenu::where('id', $request->submenu_id)->first();
    }

    public function subMenuAdd(Request $request)
    {
        if ($request->sub_menu_id) {
            $sub_menu = SubMenu::where('id', $request->sub_menu_id)->first();
        } else {
            $sub_menu = new SubMenu();
        }

        $sub_menu->menu_id  =  $request->menu_id;
        $sub_menu->en_name = $request->en_name;
        $sub_menu->ja_name = $request->ja_name;
        $sub_menu->icon    = $request->icon;

        $sub_menu->save();

        return [
            'status' => true
        ];
    }

    public function subMenuChangeStatus(Request $request)
    {
        $sub_menu = SubMenu::where('id', $request->id)->first();
        if ($sub_menu) {
            $sub_menu->status = $request->status;
            $sub_menu->save();

            $sub_menu->menuPage()->update([
                'status' => $request->status,
            ]);

            return true;
        }
        return false;
    }

    # --------------menu page section----------------------#

    public function menuPageList(MenuPageDataTable $dataTable)
    {
        $menu = Menu::where('status', 1)/* ->where('name', '!=', 'Home') */->get();

        return $dataTable->render('admin.menu_page.list', compact('menu'));
    }

    // public function addUpdateSpread(SpreadRequest $request)
    // {
    //     $spread = new Spread();
    //     if ($request->spread_id) {
    //         $spread = Spread::find($request->spread_id);
    //     }

    //     $spread->category_id        =   $request->category_id;
    //     $spread->symbol             =   $request->symbol;
    //     $spread->ja_symbol          =   $request->ja_symbol;
    //     $spread->ultimate_account   =   $request->ultimate_account;
    //     $spread->premium_account    =   $request->premium_account;
    //     $spread->starter_account    =   $request->starter_account;
    //     $spread->basic_account      =   $request->basic_account;

    //     $spread->save();

    //     return 1;
    // }

    public function getMenuPage(Request $request)
    {
        $menuPages = MenuPage::find($request->id);
        return $menuPages;
    }

    public function menuPageAdd(Request $request)
    {

        // $hasSubMenu = Menu::whereNotNull('sub_menu_id')->exists();
        // dd( $hasSubMenu );

        $getMenuId = SubMenu::where('menu_id', $request->menu_id)->pluck('id')->toArray();

        if ($getMenuId) {
            $validatedData = $request->validate([
                'menu_id'     => 'required',
                'sub_menu_id' => 'required',
                'en_name'     => 'required',
                'ja_name'     => 'required',
            ], [
                'menu_id.required' => 'This field is required',
                'sub_menu_id.required' => 'This field is required',
                'en_name.required' => 'This field is required',
                'ja_name.required' => 'This field is required',
            ]);
        } else {
            $validatedData = $request->validate([
                'menu_id'     => 'required',
                'sub_menu_id' => 'nullable',
                'en_name'     => 'required',
                'ja_name'     => 'required',
            ], [
                'menu_id.required' => 'This field is required',
                'sub_menu_id.required' => 'This field is required',
                'en_name.required' => 'This field is required',
                'ja_name.required' => 'This field is required',
            ]);
        }


        if ($request->page_id) {
            $menu_page = MenuPage::where('id', $request->page_id)->first();
        } else {
            $menu_page = new MenuPage();
            $menu_page->slug = Str::slug($validatedData['en_name']);
        }
        // $menu_page->slug = Str::slug($validatedData['en_name']);
        $menu_page->menu_id =  $validatedData['menu_id'];
        $menu_page->sub_menu_id = $validatedData['sub_menu_id'] ?: NULL;
        $menu_page->en_name = $validatedData['en_name'];
        $menu_page->ja_name =  $validatedData['ja_name'];
        $menu_page->icon = $request->icon ?: NULL;

        $menu_page->save();
        return [
            'status' => true
        ];
    }


    // public function menuPageAdd(Request $request)
    // {
    //     if ($request->page_id) {
    //         $menu_page = MenuPage::where('id', $request->page_id)->first();
    //     } else {
    //         $menu_page = new MenuPage();
    //     }
    //     $menu_page->slug = Str::slug($request->en_name);
    //     $menu_page->menu_id =  $request->menu_id;
    //     $menu_page->sub_menu_id =  $request->sub_menu_id;
    //     $menu_page->en_name = $request->en_name;
    //     $menu_page->ja_name = $request->ja_name;
    //     $menu_page->icon = $request->icon ?: NULL;

    //     $menu_page->save();

    //     return [
    //         'status' => true
    //     ];
    // }

    public function menuPageChangeStatus(Request $request)
    {
        $menu_page = MenuPage::where('id', $request->id)->first();
        if ($menu_page) {
            $menu_page->status = $request->status;
            $menu_page->save();

            return true;
        }
        return false;
    }

    public function getSubMenu(Request $request)
    {
        $sub_menu = SubMenu::where('menu_id', $request->menu_id)->where('status', 1)->get();

        return $sub_menu;
    }

    public function menuPageGet(Request $request)
    {
        $page = MenuPage::with(['menu', 'subMenu'])->where('id', $request->page_id)->first();
        $sub_menu = SubMenu::where('menu_id', $page->menu_id)->where('status', 1)->get();
        $page['original_icon'] = $page->getRawOriginal('icon');
        return [
            'page' => $page,
            'sub_menu' => $sub_menu,
        ];
    }
}
