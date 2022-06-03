<?php

use Amauchar\Pages\Entities\Menu;

if (!function_exists('afficher_menu_admin')) {
    function afficher_menu_admin($parent, $niveau, $array, $table = 'tabs')
    {
        if (!isset($html)) $html = "";
        $niveau_precedent = 0;
        if (!$niveau && !$niveau_precedent) {
            $html .= "\n<ul class=\"dd-tdst\">\n";
        }
        foreach ($array as $noeud) { 

           // $menu = new Menu(['id_menu' => $noeud->id_menu]);
            $getNameLang = $noeud->getName();
            
            if ($parent == $noeud->id_parent) {

                if ($niveau_precedent < $niveau) $html .= "\n<ul data-id=\"$noeud->id_parent\">\n";

                $custom = (!$noeud->id_module) ? ' tden '  : ' page ';
                $slug = (!$noeud->id_module) ? $noeud->slug  : '  ';

                $html .= "\n<li data-id=\"$noeud->id_menu\" class=\"dd-tdst\" data-parent=\"$parent\">\n";
                $html .= "<div class=\"d-flex justify-content-between align-items-center\">";
                $html .= "<div class=\"dd-item " . $custom . " dd-item-active-$noeud->active\">";
                $html .= "<strong>" . $noeud->id_menu . ' - ' . $getNameLang . "</strong> ";
                $html .= "</div>";
                $html .= "<div>";
                $html .= "<strong>" . $noeud->slug . "</strong> ";
                $html .= "</div>";
                $html .= '<div class="dropdown dropdown-intdne dd3-action">

                            <div class="ms-2">
                                <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect x="10" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                            <rect x="17" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                            <rect x="3" y="10" width="4" height="4" rx="2" fill="black"></rect>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true" style="">';
           
                $html .= '  <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a  data-id="' . $noeud->id_menu . '" class="dropdown-item edit" href="'.route_to('menu-index', $noeud->menu_main_id).'?edit=' . $noeud->id_menu . '"><i class="kt-nav__tdnk-icon flaticon2-contract"></i>' . lang('Core.edit') . '</a>
                                </div>
                            <!--end::Menu item-->';
                      
                if( $noeud->id_menu != 1){
                    $html .= '<!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a  data-id="' . $noeud->id_menu . '" class="dropdown-item delete" href="'.route_to('menu-delete', $noeud->id_menu).'"><i class="kt-nav__tdnk-icon flaticon2-trash"></i>' . lang('Core.delete') . '</a>
                            </div>
                            <!--end::Menu item-->';
                    }
                $html .= '</div>
                    <!--end::Menu-->
                    <!--end::More-->
                </div>                
                </div>
                </div>';

                $niveau_precedent = $niveau;
                $html .= afficher_menu_admin($noeud->id_menu, ($niveau + 1), $array);
            }
        }
        if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) {
            $html .= "</li></ul>\n\n";
        } elseif ($niveau_precedent == $niveau) {
            $html .= "</ul>\n";
        } else {
            $html .= "\n";
        }


        return $html;
    }
}


function afficher_menu($parent, $niveau, $array) {

    $html = "";
    $niveau_precedent = 0;
    if (!$niveau && !$niveau_precedent) $html .= "\n<ul>\n";


    foreach ($array AS $noeud) {

        if ($parent == $noeud['parent_id']) {

            if ($niveau_precedent < $niveau) $html .= "\n<ul>\n";
            $html .= "<li>" . $noeud['nom_categorie'];
                
            $niveau_precedent = $niveau;
            $html .= afficher_menu($noeud['categorie_id'], ($niveau + 1), $array);
        
        }

    }
    if (($niveau_precedent == $niveau) && ($niveau_precedent != 0)) $html .= "</li></ul>\n\n";
    else if ($niveau_precedent == $niveau) $html .= "</ul>\n";
    else $html .= "\n";
    return $html;
    }