<?php

class Controller
{
    /**
     * @var string
     */
    private $viewsFolderPath;

    /**
     * Create new controller class instance.
     */
    public function __construct()
    {
        $this->viewsFolderPath = dirname(__DIR__) . '/View/';
    }

    /**
     * Load view from views folder path, also passes arguments into that view.
     *
     * @param $strViewPath
     * @param null $arrayOfData
     * @return string
     */
    public function loadView ($strViewPath, $arrayOfData = null)
    {
        // pass the params to the view
        if( !is_null($arrayOfData) ) extract($arrayOfData);

        // load the view content
        ob_start();
        require_once($this->viewsFolderPath . $this->dottedToSlash($strViewPath));

        // return the view content
        $strView = ob_get_contents();
        ob_end_clean();
        return $strView;
    }

    /**
     * Makes view loads more object oriented.
     *
     * @param $viewPath
     * @return string
     */
    private function dottedToSlash($viewPath)
    {
        return str_replace('.', '/', $viewPath) . '.php';
    }
}