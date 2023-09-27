<?php
class stellenangebote_benefits extends \rex_yform_manager_dataset
{

    public function getName() :string
    {
        return $this->getValue('name');
    }
    public function getDescription() :string
    {
        return $this->getValue('description');
    }
    public function getIcon() :string
    {
        return $this->getValue('icon');
    }
    public function showIcon() :void
    {
        if($icon = rex_media_plus::get($this->getValue('icon_custom'))) {
            echo $icon->getImg();
        } elseif($this->getValue('icon')) {
            echo '<i class="'. $this->getIcon() .'"></i>';
        }
    }
    public function getIconCustom() :string
    {
        return $this->getValue('icon_custom');
    }
    public static function findBySet($set = '')
    {
        return self::query()->whereRaw('FIND_IN_SET(id, "'.$set.'")')->find();
    }


}
