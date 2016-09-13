#!/usr/bin/python2.4
# Small script to show PostgreSQL and Pyscopg together
#

import json
import psycopg2
import sys

match_id = sys.argv[1]
match_id = 2125002095
conn = psycopg2.connect("dbname='postgres' user='petergleixner' host='localhost' password=''")
cursor = conn.cursor()
cursor.execute('''SELECT replay_file FROM replay_data WHERE match_id = %s''' %(match_id))
db_file = cursor.fetchone()

replay_file = json.dumps(db_file)[1:-1]

meta_info = json.loads(replay_file)["meta_info"]
game_info = meta_info["game_info"]
player_info = meta_info["player_info"]
replay = json.loads(replay_file)["replay"]

#Creating dict with heroname:list

hero_dict = dict()
for g in player_info:
    hero_dict[g["hero_name"]] = []
count = 0
for r in replay:
    if "gold_total" in r["data"]:
        count = count + 1
        hero_name = r["data"]["hero_name"]
        tick = r["tick"]
        gold = r["data"]["gold_total"]
        tmp_dict = {"x":tick, "y":gold}
        hero_dict[hero_name].append(tmp_dict)
        print count
        print hero_name
        print "------------------"
        #if hero_name == "lion":


for hero_name in hero_dict:
    tmp_hero_gold = json.dumps(hero_dict[hero_name])
    #cursor.execute('''INSERT INTO gold_xp (match_id, hero_name, team_id, gold_data) VALUES (%s,%s,%s,%s)''', (match_id, hero_name, 4, tmp_hero_gold))
    #conn.commit()

