<?php 
namespace OneEyedCat\Core\Models;

require_once(TEMPLATE_DIR . '/core/models/wysiwyg/setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/cta/setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/map/setup.class.php');

use OneEyedCat\Core\Models\Wysiwyg\Setup as WysiwygSetup;
use OneEyedCat\Core\Models\CTA\Setup as CTASetup;
use OneEyedCat\Core\Models\Map\Setup as MapSetup;


class Setup
{
    public static function Init()
    {
        WysiwygSetup::init();
        CTASetup::init();
        MapSetup::init();
    }
}