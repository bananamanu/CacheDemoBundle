<?php

namespace Bananamanu\CacheDemoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BananamanuCacheDemoBundle extends Bundle
{
    public function getParent()
    {
        return 'BananamanuSimpleDesignBundle';
    }
}
