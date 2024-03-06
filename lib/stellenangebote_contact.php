<?php

class stellenangebote_contact extends \rex_yform_manager_dataset
{
    public function getName(): string
    {
        return $this->getValue('name');
    }
    public function getMail(): string
    {
        return $this->getValue('mail');
    }
    public function getPhone(): string
    {
        return $this->getValue('phone');
    }
    public function getImage(): string
    {
        return $this->getValue('photo');
    }
    public function getPhoto(): string
    {
        return $this->getValue('photo');
    }
    public function getDescription(): string
    {
        return $this->getValue('description');
    }
    public function getMedia(): rex_media
    {
        if($media = rex_media::get($this->getValue('photo'))) {
            return $media;
        }
        return "no media with such filename found";
    }
}
