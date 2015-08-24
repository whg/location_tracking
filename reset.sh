#!/bin/bash

folder="backups/$(date)"
mkdir "$folder"
cp locations.csv "$folder"
cp posts.csv "$folder"

:>locations.csv
:>posts.csv
