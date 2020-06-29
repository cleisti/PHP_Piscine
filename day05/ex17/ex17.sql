SELECT COUNT(*) AS 'nb_susc',
FLOOR(AVG(`price`)) as 'av_susc',
MOD(COUNT(`duration_sub`), 42) as 'ft'
FROM subscription;