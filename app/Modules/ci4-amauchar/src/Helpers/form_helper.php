<?php

use Amauchar\Core\Libraries\Language;

/**
 * CodeIgniter Form Helpers
 *
 * @package CodeIgniter
 */


//--------------------------------------------------------------------

if (!function_exists('form_input_lang')) {
    /**
     * Text Input Field. If 'type' is passed in the $type field, it will be
     * used as the input type, for making 'email', 'phone', etc input fields.
     *
     * @param mixed  $data
     * @param string string
     * @param mixed  $extra
     * @param string $type
     *
     * @return string
     */
    function form_input_lang($data = '', $value = '', $extra = '', string $type = 'text', $required = false, $builder = false): string
    {
        $html = '<div class="kt-input-icon kt-input-icon--left">';
        $html .= '<div class="input-group">';
        $html .= '<div class="input-group-prepend">';
        $html .= '<span class="input-group-text input-group-text-lang" data-lang="' . service('request')->getLocale() . '">'.service('request')->getLocale().'</span>';
        $html .= '</div>';
															
														
        $language = new language();
        $supportedLocales = $language->supportedLocales();

        if ($required == true) {
            $extra = $extra . ' required ';
        }

        if(!empty($supportedLocales)){
            foreach($supportedLocales as $k => $v) {
                $extraFormat  = '';
                $extraFormat = $extra;
                if (service('request')->getLocale() != $k) {
                    $extraFormat = $extraFormat . ' style="display:none;" ';
                }

                $extraFormat = $extraFormat . ' data-lang="' . $k . '" data-iso_lang="' . $k . '"';

                if (is_array($data)) {
                    if ($builder == true) {
                        $valueFormat = !isset($value->{$k}->{$data[2]}) ? '' : $value->{$k}->{$data[2]};
                    }else{
                        $valueFormat = !isset($value[$k]->{$data}) ? '' : $value[$k]->{$data};
                    }
                    
                } else {
                    $valueFormat = !isset($value[$k]->{$data}) ? '' : $value[$k]->{$data};
                }

                if ($builder == true) {
                    $html .= form_input(is_array($data) ?  $builder . '[' . $data[0] . '][' . $data[1] . '][lang][' .$k . '][' . $data[2 ] . ']' : 'lang[' .$k . '][' . $data . ']', $valueFormat, $extraFormat, $type);
                } else {
                    $html .= form_input(is_array($data) ?  'lang[' . $k . '][' . $data[0] . '][' . $data[1] . ']' : 'lang[' . $k . '][' . $data . ']', $valueFormat, $extraFormat, $type);
                }
                if ($required == true) {
                    $html .= ' <div class="invalid-feedback">' . lang('Core.this_field_is_requis') . '</div>';
                }
            }
        }

        $html .= '</div></div>';
        return $html;
        
    }
}

if (! function_exists('form_textarea_lang')) {
    /**
     * Textarea field
     *
     * @param mixed $data
     * @param mixed $extra
     */
    function form_textarea_lang($data = '', $value = '', $extra = '', $builder = false): string
    {
        $html = '<div class="kt-input-icon kt-input-icon--left">';

        $ramdom = mt_rand(10, 15);

        $language = new language();
        $supportedLocales = $language->supportedLocales();
        $html .= '<ul class="nav nav-custom nav-custom-lang nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold">';
        if(!empty($supportedLocales)){
            foreach($supportedLocales as $k => $v) {
                $active = service('request')->getLocale() == $k ? 'active' : '';
                 $html .= '<li class="nav-item"><a class="nav-link text-active-primary tab-lang pb-4 '.$active.'" data-lang="' . $k . '" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_tabs_lang_'.$ramdom . $k.'">'.$k.'</a></li>';
            }
        }
        $html .= '</ul>';
        $html .= '<div class="tab-content" id="myTabContent">';
        if(!empty($supportedLocales)){
                foreach($supportedLocales as $k => $v) {
                   
                $defaults = [
                    'name' => is_array($data) ? '' : $data,
                    'cols' => '40',
                    'rows' => '10',
                ];
                if (! is_array($data) || ! isset($data['value'])) {
                    $val = $value;
                } else {
                    $val = $data['value'];
                    unset($data['value']); // textareas don't use the value attribute
                }

                $extraFormat  = '';
                $extraFormat = 'id="' . $ramdom . '_' . $k . '" ' . $extra;
                // if (service('request')->getLocale() != $k) {
                //     $extraFormat = $extraFormat . ' style="display:none;" ';
                // }

                // Unsets default rows and cols if defined in extra field as array or string.
                if ((is_array($extra) && array_key_exists('rows', $extra)) || (is_string($extra) && stripos(preg_replace('/\s+/', '', $extra), 'rows=') !== false)) {
                    unset($defaults['rows']);
                }

                if ((is_array($extra) && array_key_exists('cols', $extra)) || (is_string($extra) && stripos(preg_replace('/\s+/', '', $extra), 'cols=') !== false)) {
                    unset($defaults['cols']);
                }

                if (is_array($data)) {
                    if ($builder == true) {
                        $valueFormat = !isset($value->{$k}->{$data[2]}) ? '' : $value->{$k}->{$data[2]};
                    }else{
                        $valueFormat = !isset($value[$k]->{$data}) ? '' : $value[$k]->{$data};
                    }
                    
                } else {
                    $valueFormat = !isset($value[$k]->{$data}) ? '' : $value[$k]->{$data};
                }

                $active = service('request')->getLocale() == $k ? 'active' : '';
                $html .= '<div class="tab-pane fade '.$active.' show" id="kt_tabs_lang_'.$ramdom.$k.'" role="tabpanel">';
                
                if ($builder == true) {
                    $html .=  form_textarea(is_array($data) ?  $builder . '[' . $data[0] . '][' . $data[1] . '][lang][' .$k . '][' . $data[2 ] . ']' : 'lang[' .$k . '][' . $data . ']', $valueFormat, $extraFormat);
                } else {
                    $html .=  form_textarea(is_array($data) ? $builder . '[' . $k . '][' . $data . ']' : 'lang[' . $k . '][' . $data . ']', $valueFormat, $extraFormat);
                }
                $html .= '</div>';
            }
        }
        $html .= '</div></div>';
        return $html;

    }
}
