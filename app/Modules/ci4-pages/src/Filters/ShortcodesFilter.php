<?php namespace Amauchar\Pages\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ShortcodesFilter implements FilterInterface
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
        if(in_array(ADMIN_AREA, service('request')->getUri()->getSegments()) || in_array(Config('Medias')->segementUrl, service('request')->getUri()->getSegments())){
            return;
        }

        $output = $response->getBody();
        $pattern ='~<module data-type="(.*?)" data-id="(.*?)" data-format="(.*?)" id="(.*?)" data-options="(.*?)"></module>~is';
        preg_match_all($pattern, $output, $matches);

        if (!empty($matches)){

           if (!empty($matches[1])){
                $render     = '';
                $module     = ucfirst($matches[1][0]);
                $instanceId = $matches[2][0];
                $format     = $matches[3][0];
                $id         = $matches[4][0];
                $options    = $matches[5][0];
                $model      = 'Adnduweb\Ci4'.plural($module).'\Models\\' . $module . 'Model';
                $models = new $model();

                $instance = $models->getFrontAll($instanceId);
                if(!empty($instance)){
                    $render = service('shortcode')->render($instance, $module, $format, $options);
                }
                $output = str_replace('<module data-type="'.strtolower($module).'" data-id="'.$instanceId.'" data-format="'.$format.'" id="'.$id.'" data-options="'.$options.'"></module>', $render, $output);   
            }
        }

        $response->setBody($output);

        return $response;
    }
}
