<?php
class stellenangebote_contact extends \rex_yform_manager_dataset
{
    public function getName()
    {
        return $this->getValue('name');
    }
    public function getMail()
    {
        return $this->getValue('mail');
    }
    public function getPhone()
    {
        return $this->getValue('phone');
    }
    public function getImage()
    {
        return $this->getValue('photo');
    }
    public function getPhoto()
    {
        return $this->getValue('photo');
    }
}
