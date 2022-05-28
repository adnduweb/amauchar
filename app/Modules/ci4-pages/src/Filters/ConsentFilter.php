<?php namespace Adnduweb\Pages\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ConsentFilter implements FilterInterface
{
    /**
     * Nothing to do prior to a controller running.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
    }

    /**
     * If enabled, insert the view and the styles/scripts
     * into the view file.
     *
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

       
        //var_dump(setting('Consent.requireConsent')); exit;
        if(in_array(CI_AREA_ADMIN, service('request')->getUri()->getSegments())){
            return;
        }
            
        // Consent system disabled?
        if (! service('settings')->get('Pages.consent', 'requireConsent')) {
            return;
        }

        // Get the existing consent cookie
        if (! function_exists('get_cookie')) {
            helper('cookie');
        }

       // echo 'dfgsdfgdsf'; exit;

        $cookie      = get_cookie('bf_consent');
        $permissions = json_decode($cookie, true);

        // Do we already have consent from the visitor?
        // then nothing to do here...
        if ($permissions['consent'] ?? false) {
            return;
        }
       // var_dump(config('Pages')->consentForm); exit;
        // Insert the consent form
        $html = view(config('Pages')->consentForm, [
            'consents' => config('Pages')->consents,
            'message'  => config('Pages')->consentMessage,
        ]);
        // Replace {policy_url} with the actual link.
        $link = config('Pages')->policyUrl;
        $link = strpos('http', (string) $link) === 0
            ? $link
            : site_url($link);
        $html = str_ireplace('{policy_url}', "<a href='{$link}' target='_blank'>Cookie policy</a>", $html);

        $cssFile = config('Pages')->consentFormStyles;
        $jsFile  = config('Pages')->consentFormScripts;

        $css = ! empty($cssFile) ? view($cssFile) : null;
        $js  = ! empty($jsFile) ? view($jsFile) : null;

        $output = $response->getBody();

        $output = str_replace('</head>', "{$css}\n</head>", $output);
        $output = str_replace('</body>', "{$html}\n</body>", $output);
        $output = str_replace('</body>', "{$js}\n</body>", $output);

        $response->setBody($output);

        return $response;
    }
}
