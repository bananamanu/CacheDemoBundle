<?php
namespace Bananamanu\CacheDemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;

class MainController extends Controller
{

    /**
     * Renders master location in full view
     *
     * @param $contentId
     * @param $viewType
     * @param bool $layout
     * @param array $params
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewContentAction( $contentId, $viewType, $layout = false, array $params = array() )
    {
        $params['time'] = time();

        $response = $this->get( 'ez_content' )->viewContent(
            $contentId,
            $viewType,
            $layout,
            $params
        );
        $response->setSharedMaxAge(84600);
        return $response;
    }

}
