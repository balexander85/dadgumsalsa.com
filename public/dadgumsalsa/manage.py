#!/usr/bin/env python
import os
import sys

if __name__ == "__main__":
    # os.environ.setdefault("DJANGO_SETTINGS_MODULE", "dadgumsalsa.settings")
    if os.environ['HOME'] == '/home/brianalexander':
        os.environ['DJANGO_SETTINGS_MODULE'] = "dadgumsalsa.settings_production"
    elif os.environ['HOME'] == '/Users/Brian':
        os.environ['DJANGO_SETTINGS_MODULE'] = "dadgumsalsa.settings_local"

    from django.core.management import execute_from_command_line

    execute_from_command_line(sys.argv)
