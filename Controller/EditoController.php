<?php
namespace Bananamanu\CacheDemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;

class EditoController extends Controller
{

    /**
     * Renders edito location in full view
     *
     * @param $locationId
     * @param $viewType
     * @param bool $layout
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewLocationLineAction( $locationId, $viewType, $layout = false, array $params = array() )
    {
        // Get children content location
        //@TODO include sort order
        $helper = $this->get('bananamanu_simple_design.subelement_helper');
        $children = $helper->getSubElementLocation($locationId);
        $params['children'] = $children;
        $params['time'] = time();

        return $this->get( 'ez_content' )->viewLocation(
            $locationId,
            $viewType,
            $layout,
            $params
        );
    }

    /**
     * Renders edito location in full view
     *
     * @param $locationId
     * @param $viewType
     * @param bool $layout
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewLocationFullAction( $locationId, $viewType, $layout = false, array $params = array() )
    {
        $params['time'] = time();
        $response = $this->get( 'ez_content' )->viewLocation(
            $locationId,
            $viewType,
            $layout,
            $params
        );
        $response->setSharedMaxAge(84600);
        return $response;
    }

}
