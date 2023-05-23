<?php
class stellenangebote_category extends \rex_yform_manager_dataset
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

}
