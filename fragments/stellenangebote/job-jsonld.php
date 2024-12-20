<?php

$stellenangebot = Alexplusde\Stellenangebote\Posting::get($this->getVar("id"));

$stelle = [];
$stelle["@context"] = "https://schema.org/";
$stelle["@type"] = "JobPosting";
$stelle["title"] = $stellenangebot->getTitle();
$stelle["description"] = $stellenangebot->getDescription();
$stelle["datePosted"] = $stellenangebot->getDatePosted();
$stelle["validThrough"] = $stellenangebot->getValidThrough();
$stelle["directApply"] = $stellenangebot->getdirectApply();
$stelle["employmentType"] = $stellenangebot->getEmploymentType();
$stelle["jobLocationType"] = ($stellenangebot->jobLocationType() == true) ? "TELECOMMUTE" : "";

# $baseSalary = [];

$hiringOrganization = [];
$hiringOrganization["@type"] = "Organization";
$hiringOrganization["name"] = rex_config::get("stellenangebote", "company_name");
$hiringOrganization["sameAs"] = rex_config::get("stellenangebote", "company_url");
# $hiringOrganization["logo"] = "";

$stelle["hiringOrganization"] = $hiringOrganization;

$jobLocation = [];
$jobLocation["@type"] = "Place";
$jobLocation["address"]["@type"] = "PostalAddress";
# $jobLocation["address"]["addressLocality"] = $this->getLocationAddressLocality();
# $jobLocation["address"]["addressCountry"] = $this->getLocationAddressCountry();

$stelle["jobLocation"] = $jobLocation;

echo json_encode($stelle);
