from selenium.webdriver.common.keys import Keys 					# Definitely used for the send_keys(Keys.RETURN) function, send the "Return" key
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait 	        # available since 2.4.0
from webdriverplus import WebDriver
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
	quantity_box = WebDriverWait(driver, 3).until(lambda driver : driver.find(name="quantity"))
	quantity_box.send_keys("4")
	
def enter_customer_info():
	# find the element that's name attribute is Email (username box)
	full_name_box = driver.find(name="fullname")
	email_box = driver.find(name="email")
	#phone_box = driver.find(name="phone")
	address_box = driver.find(name="address")
	city_box = driver.find(name="city")
	state_box = driver.find(name="state")
	zip_box = driver.find(name="zipcode")
	# type in the user name
	full_name_box.send_keys("Brian Alexander")
	email_box.send_keys("balexander04@gmail.com")
	address_box.send_keys("2901 Barton Skyway #1201")
	city_box.send_keys("Austin")
	state_box.send_keys("TX")
	zip_box.send_keys("78746")
	#phone_box.send_keys("214-762-5564")

def enter_customer_credit():
	credit_box = driver.find_element_by_class_name("card-number")
	cvc_box = driver.find_element_by_class_name("card-cvc")
	exp_month_box = driver.find_element_by_class_name("card-expiry-month")
	exp_year_box = driver.find_element_by_class_name("card-expiry-year")
	card_type_box = driver.find_element_by_class_name("card-name")

	credit_box.send_keys("4242424242424242")
	cvc_box.send_keys("423")
	card_type_box.send_keys("Visa")
	exp_month_box.send_keys("10")
	exp_year_box.send_keys("2012")
	
def submit():
	submit_button = driver.find_element_by_class_name("submit-button")
	submit_button.click()

def go_home():
	home_link = driver.find(id="linkHome")
	home_link.click()

def click_order():
	order_link = WebDriverWait(driver, 3).until(lambda driver : driver.find(id="order_MenuLink"))
	order_link.click()

def change_size():
	jar_size_drop = driver.find(id="quart")
	jar_size_drop.click()

#||||||||||||||||||||||||||||||||||End of Function Definitions||||||||||||||||||||||||||||||||||||||||||||||||
#$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$Beginning of Program$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Create a new instance of the Firefox driver
driver = WebDriver('firefox', quit_on_exit=True, reuse_browser=True)

print driver.title

current_time()
print "|||||||||||||||||||||||||||||||||||||||||||||||||||||||"
driver.get("http://localhost/dev.dadgumsalsa.com/jsvalidation.php")

customer_quantity()
enter_customer_info()
enter_customer_credit()
submit()

#go_home()

print "Press enter to close!"
raw_input()
driver.quit()

#$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$End of Program$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
