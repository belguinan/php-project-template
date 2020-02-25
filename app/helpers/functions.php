<?php  

if (! function_exists('isLogin')) {
	/**
     * Check if user session is set (user logged)
     *
     * @return boolean
     */
	function isLogin() 
	{
		return isset($_SESSION['user']) && ! empty($_SESSION['user']);
	}
}


if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param  string  $abstract
     * @param  array   $parameters
     * @return mixed|\Illuminate\Foundation\Application
     */
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return \Illuminate\Container\Container::getInstance();
        }

        return \Illuminate\Container\Container::getInstance()->make($abstract, $parameters);
    }
}

if (! function_exists('appPath')) {
	function appPath($file = '')
	{
		return str_replace("//", '/', str_replace('/app', '/', dirname(__DIR__)));
	}
}

if (! function_exists('resource_path')) {
	function resourcePath($file = '')
	{
		return str_replace("//", '/', appPath() . '/resouces/' . $file);
	}
}

if (! function_exists('get_resource')) {

	/**
	 * @return void
	 */
	function getView($viewName)
	{
		$viewName = str_replace(['.', '/'], '', $viewName);

		if (file_exists(resourcePath('/views/' . $viewName . '.php'))) {
			include resourcePath('/views/' . $viewName . '.php');
		}
	}
}