<?php

use Alexplusde\Stellenangebote\Posting;
use rex_config;

$stellenangebot = Posting::get($this->getVar("id"));

$output = [];
$output["@context"] = "https://schema.org/";
$output["@type"] = "JobPosting";
$output["title"] = $stellenangebot->getTitle();
$output["description"] = $stellenangebot->getDescription();
$output["datePosted"] = date("Y-m-d", strtotime($stellenangebot->getDatePosted()));

$output["directApply"] = $stellenangebot->getdirectApply();
$output["employmentType"] = $stellenangebot->getEmploymentType();

if ($stellenangebot->getValidThrough()) {
    $output["validThrough"] = date("Y-m-d", strtotime($stellenangebot->getValidThrough()));
}

$output["employmentType"] = $stellenangebot->getEmploymentType();

$hiringOrganization = [];
$hiringOrganization["@type"] = "Organization";
$hiringOrganization["name"] = rex_config::get("stellenangebote", "company_name");
$hiringOrganization["sameAs"] = rex_config::get("stellenangebote", "company_url");

if (rex_config::get("stellenangebote", "company_logo")) {
    $hiringOrganization["logo"] = rex_config::get("stellenangebote", "company_logo");
}

$output["hiringOrganization"] = $hiringOrganization;

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

echo json_encode($output);
