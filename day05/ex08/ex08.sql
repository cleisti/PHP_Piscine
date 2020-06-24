SELECT `last_name`, `first_name`, CAST(`birthdate` AS date) FROM user_card
WHERE YEAR(`birthdate`) = 1989;