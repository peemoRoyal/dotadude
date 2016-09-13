<!-- Insert Values -->
INSERT INTO replay_data (jdoc) VALUES('');

<!-- select normal in array -->
SELECT *
FROM
    replays r, json_array_elements(r.replay_file#>'{replay}') obj
WHERE
    obj->>'tick' = '2252';

<!-- select verschachtelt in array -->
SELECT *
FROM
    replays r, json_array_elements(r.replay_file#>'{replay}') obj
WHERE
    obj->'data'->>'hero_name' = 'pudge';

