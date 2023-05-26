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
    public static function findBySet($set = '') {
        return self::query()->whereRaw('FIND_IN_SET(id, "'.$set.'")')->find();  
    }


}
