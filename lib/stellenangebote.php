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
    public function getProfile() :string
    {
        return $this->getValue('profile');
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
        $options_selected = explode(",", $this->getValue('employment_type'));

        $options = \rex_yform_value_choice::getListValues([
            'field'  => 'employment_type',
            'params' => ['field' => $this->getTable()->getValueField('employment_type')],
        ]);

        $labels_selected = [];

        foreach($options_selected as $selected) {
            $labels_selected[] = $options[$selected];
        }
        return implode(", ", $labels_selected);
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
    public function getImage() :string
    {
        return $this->getValue('image');
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

    public function getLocationNames()
    {
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
    
    public function getUrl() :string
    {
        if ($this->getValue('article_id')) {
            return rex_yrewrite::getFullUrlByArticleId($this->getValue('article_id'));
        }
        return rex_yrewrite::getFullUrlByArticleId();
    }
    
    public function getCategory() : ?stellenangebote_category
    {
        return $this->getRelatedDataset('category_id');
    }
    public function getCategoryName() :string
    {
        return $this->getCategory()->getName();
    }
    public function getCategoryIcon() :string
    {
        return $this->getCategory()->getIcon();
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

    public static function findOnline($limit = 6)
    {

        return stellenangebote::query()->where("status", 1, '>=')->limit($limit)->find();

    }

    public function getShareMailHref() :string
    {
        return 'mailto:?subject=' . urlencode(rex_article::getCurrent()->getName()) . '&body=' . urlencode($this->getUrl()) . '%0AIst%20diese%20Stelle%20f%C3%BCr%20dich%20interessant?';
    }
    public function getShareFacebookHref() :string
    {
        return "https://www.facebook.com/sharer/sharer.php?u=". $this->getUrl();
    }
    public function getShareLinkedInHref() :string
    {
        return "https://www.linkedin.com/sharing/share-offsite/?url=".$this->getUrl();
    }
    public function getShareTwitterHref() :string
    {
        return "";
    }

    public function getShareWhatsAppHref()
    {
        return "https://api.whatsapp.com/send?text=". urlencode($this->getUrl());
    }

    public function getBenefitsIds() :string
    {
        return $this->getValue('benefits');
    }
    
    public function getBenefits()
    {
        return stellenangebote_benefits::findBySet($this->getBenefitsIds());
    }

    public static function getConfig($key ="") :mixed
    {
        return rex_config::get('stellenangebote', $key);
    }

    public static function setConfig($key ="", $value) :mixed
    {
        return rex_config::set('stellenangebote', $key, $value);
    }



}
