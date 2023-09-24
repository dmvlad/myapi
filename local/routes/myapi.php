<?php
define('SKIP_TEMPLATE_AUTH_ERROR', true);

//fix проблемы авторизации на внутренних страницах при использовании роутинга
$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

if(substr($request->getRequestedPageDirectory(), 1, 5) == "myapi"
    || substr($request->getRequestedPageDirectory(), 1, 4) == "rest"
){
    define('NOT_CHECK_PERMISSIONS', true);
}


use Bitrix\Main\Routing\RoutingConfigurator;
use Bitrix\Myapi\Controller;

/*
return function (RoutingConfigurator $routes) {
	$routes->any('/myapi/hlblock/getItems/', [Controller::class, 'getitems']);
	$routes->any('/myapi/hlblock/addLog/', [Controller::class, 'addlog']);

	$routes->any('/myapi/hlblock/getLog/', [Controller\Getlog::class, 'getLog']);
	$routes->any('/myapi/hlblock/getJson/', [Controller\Jsonlog::class, 'getLog']);
};
*/

return function (RoutingConfigurator $routes) {
    $routes->prefix('myapi')->group(function (RoutingConfigurator $routes) {
        $routes->prefix('hlblock')->group(function (RoutingConfigurator $routes) {
            $routes->any('getLog/', [Controller\getlog::class, 'getLog']);
            $routes->any('getJson/', [Controller\jsonlog::class, 'getLog']);
        });
    });
};

