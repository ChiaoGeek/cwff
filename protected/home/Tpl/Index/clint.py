#!/usr/bin/env python2.7
#-*-coding:utf-8-*-

import xmlrpclib

proxy = xmlrpclib.ServerProxy("http://192.168.120.181:8090/")

print proxy.add(7, 3)