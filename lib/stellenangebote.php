<?php
class stellenangebote extends \rex_yform_manager_dataset
{
    private $locations = null;
    private $contact = null;

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
        return $this->getValue('description');
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
    
    public function getLocations()
    {
        if ($this->locations == null) {
            $this->locations = $this->getRelatedCollection('location');
        }
        return $this->locations;
    }

    public function getLocationsFlattened() {
        $location_list = [];
        
        foreach($this->getLocations() as $location) {
            $location_list[] =  $location->getLocality(); 
        };
        return implode(", ", $location_list); 
    }

    public function getContact()
    {
        if ($this->contact == null) {
            $this->contact = $this->getRelatedDataset('contact');
        }
        return $this->contact;
    }

    public function getApplyForm()
    {
        $fragment = new rex_fragment();
        return $fragment->parse('stellenangebote/apply.php');
    }

    public static function getByArticleId($id)
    {
        return self::query()->where('article_id', $id)->findOne();
    }
    
    public function getUrl() :string {
        if ($this->getValue('article_id')) {
            return rex_article::get(self::getValue('article_id'))->getUrl();
        }
        return "";
    }
    
    public function getCategoryName() :string
    {
        return "Logistik";
    }

    public static function addContentPage()
    {

        rex_extension::register('PAGES_PREPARED', function () {
            $page = new rex_be_page('stellenangebote', rex_i18n::msg('stellenangebote_content_page_title'));
            $page->setPjax(false);
            $page->setSubPath(rex_addon::get('stellenangebote')->getPath('pages/content.form.php'));
            $page_controller = rex_be_controller::getPageObject('content');
            $page->setItemAttr('class', "pull-left");
            $page_controller->addSubpage($page);
        });
    }

    public static function findOnline($limit = 6) {

        return stellenangebote::query()->where("status", 0, '>=')->limit($limit)->find();

    }

    public function getShareMailHref() :string {
        return "";
    }
    public function getShareFacebookHref() :string {
        return "";
    }
    public function getShareLinkedInHref() :string {
        return "";
    }
    public function getShareTwitterHref() :string {
        return "";
    }

    public function getBenefitsIds() :string {
        return $this->getValue('benefits');
    }
    
    public function getBenefits() {
        return stellenangebote_benefits::findBySet($this->getBenefitsIds());  
    }


}
