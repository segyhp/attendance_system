import RPi.GPIO as GPIO
import time
from gpiozero import Buzzer
from time import sleep

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
buzzer = Buzzer(21)

GPIO.setup(17, GPIO.OUT)
#print "LED on"
GPIO.output(17, GPIO.HIGH)
buzzer.on()
buzzer.beep()
#sleep(0.5)
time.sleep(0.2)
#print "LED off"
buzzer.off()
#sleep(1)
GPIO.output(17,GPIO.LOW)
