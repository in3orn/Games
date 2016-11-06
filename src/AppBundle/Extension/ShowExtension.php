<?php

namespace AppBundle\Extension;

class ShowExtension extends \Twig_Extension
{
	/**
	 * 
	 * {@inheritDoc}
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions()
	{
	    return array(
	        new \Twig_SimpleFunction('show_row', array($this, 'showRow')),
	    );
	}

	public function showRow()
	{
		return "<div class=\"row\"><hr>lalalalalala</div>";
	}

	public function getName()
	{
		return 'app_show';
	}

}