SET NAMES utf8mb4;

INSERT INTO `rex_yform_email_template` (`name`, `mail_from`, `mail_from_name`, `mail_reply_to`, `mail_reply_to_name`, `subject`, `body`, `body_html`, `attachments`, `updatedate`) VALUES
('stellenangebote_apply_confirm',	'',	'',	'',	'',	'',	'',	'',	'',	NOW()),
('stellenangebote_apply',	'',	'',	'',	'',	'',	'',	'',	'',	NOW());

INSERT INTO `rex_stellenangebote_contact` (`status`, `name`, `mail`, `phone`, `description`) VALUES
('1',	'Personalabteilung',	'bewerbung@example.org',	'012345 / 6789 - 0',	'<p></p>');

INSERT INTO `rex_stellenangebote_location` (`google_places`, `name`, `street`, `zip`, `locality`, `countrycode`, `lat_lng`, `lat`, `lng`) VALUES
('',	'Unternehmensname',	'',	'',	'',	'DE',	'',	'', '');
