<?php
namespace Bananamanu\CacheDemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use eZ\Bundle\EzPublishCoreBundle\Controller;

class AsideController extends Controller
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

    /**
     * Renders aside content regarding current user
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewUserInfoAction()
    {
        $user = $this->getRepository()->getCurrentUser();
        $response = new Response();
        $response->setVary('X-User-Hash');
        $response->setSharedMaxAge(300);
        $response->setPublic();

        $params = array();
        $params['time'] = time();
        $params['user'] = $user;

        return $this->render('BananamanuCacheDemoBundle:aside:user_info.html.twig', $params, $response);

    }

}
