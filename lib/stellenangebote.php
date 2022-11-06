<?php
class stellenangebote extends \rex_yform_manager_dataset
{
    public function getTitle() :string
    {
        return $this->getValue('title');
    }
    public function getTeaser() :string
    {
        return $this->getValue('teaser');
    }
    public function getDescription() :string
    {
        return $this->getValue('title');
    }
    public function getDatePosted() :string
    {
        return $this->getValue('createdate');
    }
    public function getDatePostedFormatted() :string
    {
        return $this->getValue('createdate');
    }
    public function getEmploymentType() :string
    {
        return $this->getValue('employment_type');
    }
    public function getEmploymentTypeFormatted() :string
    {
        return $this->getValue('employment_type');
    }
    public function jobLocationType() :string
    {
        return $this->getValue('telecommute');
    }
    public function getValidThrough() :string
    {
        return $this->getValue('valid_through');
    }
    public function getValidThroughFormatted() :string
    {
        return $this->getValue('valid_through');
    }
    public function getDirectApply() :string
    {
        return $this->getValue('direct_apply');
    }
    public function getLocationAddress() :string
    {
        return "";
    }
}
