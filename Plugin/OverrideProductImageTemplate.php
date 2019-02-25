<?php
namespace MageDev\Lazyload\Plugin;

use Magento\Catalog\Block\Product\Image as ImageSubject;

class OverrideProductImageTemplate
{

    protected $_helper;

    public function __construct(
        \MageDev\Lazyload\Helper\Data $lazyloadHelper
    ) {
        $this->helper = $lazyloadHelper;
    }

    public function beforeSetTemplate(ImageSubject $subject, $template)
    {
        $config = $this->helper->getConfig();
        if($config['enable'])
        {
            $template = str_replace('Magento_Catalog', 'MageDev_Lazyload', $template);
            return [$template];
        }
    }
}
