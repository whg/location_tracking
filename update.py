
from mod_python import apache

import os
import urllib2

import json

def createJSON():
	data = []
	with open(os.path.dirname(__file__) + "/locations") as file:
		for line in file:
			long, latt, time = line.strip().split(',')
			data.append(dict({ "long": float(long), "latt": float(latt), "time": float(time) }))
		
	with open(os.path.dirname(__file__) + "/locations.json", 'w') as f:
			json.dump(data, f, indent=True)
			f.close()

def index(req, long="0", latt="0", timestamp="0", status="nil"):

	return ""

	workingdir = os.path.dirname(__file__) + "/"
	locations_file = workingdir + "locations"
	status_file = workingdir + "status"
	lastupdate_file = workingdir + "lastupdate"
	req.content_type = "text/html"
		
	response = ""
	
	if status != "nil":
		with open(status_file, "w") as file:
			file.write(status)
		
	if long != "0" and latt != "0":
		with open(locations_file, "a") as locations_file:
			locations_file.write(long + "," + latt)
			response = response + "location updated "
			if timestamp != "0":
				locations_file.write("," + timestamp + "\n")
				response = response + "with timestamp"
		

	createJSON()
	

	return response;
