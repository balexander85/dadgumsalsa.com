from selenium import webdriver
from selenium.webdriver.common.keys import Keys 					# Definitely used for the send_keys(Keys.RETURN) function, send the "Return" key
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait 	        # available since 2.4.0
import datetime														# used to get the current time
import getpass														# for security purposes, user cannot see the password being entered
import re

#||||||||||||||||||||||||||||||||||Beginning of Function Definitions||||||||||||||||||||||||||||||||||||||||||||||||
def current_time():
	now = datetime.datetime.now()
	print "Current date and time"
	print "%d-%d-%d %d:%d" % (now.day, now.month, now.year, now.hour, now.minute)

def customer_quantity():
	#enter the # of jars customer wants
	quantity_box = driver.find_element_by_name("quantity")
	quantity_box.send_keys("2")
	
def enter_customer_info():
	# find the element that's name attribute is Email (username box)
	first_name_box = driver.find_element_by_name("firstname")
	last_name_box = driver.find_element_by_name("lastname")
	email_box = driver.find_element_by_name("email")
	phone_box = driver.find_element_by_name("phone")
	# type in the user name
	first_name_box.send_keys("Wesley")
	last_name_box.send_keys("Vincent")
	email_box.send_keys("balexander04@gmail.com")
	phone_box.send_keys("214-762-5564")

def enter_customer_credit():
	credit_box = driver.find_element_by_class_name("card-number")
	cvc_box = driver.find_element_by_class_name("card-cvc")
	exp_month_box = driver.find_element_by_class_name("card-expiry-month")
	exp_year_box = driver.find_element_by_class_name("card-expiry-year")

	credit_box.send_keys("4242424242424242")
	cvc_box.send_keys("123")
	exp_month_box.send_keys("09")
	exp_year_box.send_keys("2014")
	
def submit():
	submit_button = driver.find_element_by_class_name("submit-button")
	submit_button.click()

def go_home():
	home_link = driver.find_element_by_id("linkHome")
	home_link.click()

def click_order():
	order_link = driver.find_element_by_name("order_MenuLink")
	order_link.click()

def change_size():
	jar_size_drop = driver.find_element_by_name("quart")
	jar_size_drop.click()

#||||||||||||||||||||||||||||||||||End of Function Definitions||||||||||||||||||||||||||||||||||||||||||||||||
#$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$Beginning of Program$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Create a new instance of the Firefox driver
driver = webdriver.Firefox()

print driver.title

current_time()
print "|||||||||||||||||||||||||||||||||||||||||||||||||||||||"
driver.get("http://localhost/brianalexander/dev.dadgumsalsa.com/")

click_order()
change_size()
customer_quantity()
enter_customer_info()
enter_customer_credit()
submit()

#go_home()

print "Press enter to close!"
raw_input()
driver.quit()

#$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$End of Program$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
