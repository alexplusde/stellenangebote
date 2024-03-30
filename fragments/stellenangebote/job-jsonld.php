<?php

$stellenangebot = stellenangebote::get($this->getVar("id"));

$stelle = [];
$stelle["@context"] = "https://schema.org/";
$stelle["@type"] = "JobPosting";
$stelle["title"] = $stellenangebot->getTitle();
$stelle["description"] = $stellenangebot->getDescription();
$stelle["datePosted"] = date("Y-m-d", strtotime($stellenangebot->getDatePosted()));

$stelle["directApply"] = $stellenangebot->getdirectApply();
$stelle["employmentType"] = $stellenangebot->getEmploymentType();

if ($stellenangebot->getValidThrough()) {
    $stelle["validThrough"] = date("Y-m-d", strtotime($stellenangebot->getValidThrough()));
}

$stelle["employmentType"] = $stellenangebot->getEmploymentType();

$hiringOrganization = [];
$hiringOrganization["@type"] = "Organization";
$hiringOrganization["name"] = rex_config::get("stellenangebote", "company_name");
$hiringOrganization["sameAs"] = rex_config::get("stellenangebote", "company_url");

if (rex_config::get("stellenangebote", "company_logo")) {
    $hiringOrganization["logo"] = rex_config::get("stellenangebote", "company_logo");
}

$stelle["hiringOrganization"] = $hiringOrganization;

$locations = $stellenangebot->getLocations();
$jobLocations = [];

foreach ($locations as $location) {
    /** @var stellenangebote_location $location */
    $jobLocation = [];
    $jobLocation["@type"] = "Place";
    $jobLocation["address"]["@type"] = "PostalAddress";
    // $jobLocation["address"]["addressLocality"] = $location->getAddressLocality();
    // $jobLocation["address"]["addressCountry"] = $location->getAddressCountry();

    $jobLocations[] = $jobLocation;
}

/*
$stelle["jobLocation"] = $jobLocations;
*/

/*
if ($stellenangebot->getBaseSalary()) {
    $baseSalary = [];
    $baseSalary["@type"] = "MonetaryAmount";
    $baseSalary["currency"] = "EUR";
    $baseSalary["value"] = $stellenangebot->getBaseSalary();

    $stelle["baseSalary"] = $baseSalary;
}
*/

echo json_encode($stelle);
