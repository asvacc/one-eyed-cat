<?php 
namespace OneEyedCat\Core\Models;

require_once(TEMPLATE_DIR . '/core/models/wysiwyg/setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/cta/setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/map/setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/list/setup.class.php'); 
require_once(TEMPLATE_DIR . '/core/models/menu/setup.class.php');
require_once(TEMPLATE_DIR . '/core/models/event/setup.class.php');

use OneEyedCat\Core\Models\Wysiwyg\Setup as WysiwygSetup;
use OneEyedCat\Core\Models\CTA\Setup as CTASetup;
use OneEyedCat\Core\Models\Map\Setup as MapSetup;
use OneEyedCat\Core\Models\Menu\Setup as MenuSetup;
use OneEyedCat\Core\Models\Event\Setup as EventSetup;

class Setup
{
    public static function Init()
    {
        WysiwygSetup::init();
        CTASetup::init();
        MapSetup::init();
        MenuSetup::init();
        EventSetup::init();
    }
}