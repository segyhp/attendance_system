from gpiozero import Buzzer
from time import sleep

buzzer = Buzzer(21)
buzzer.on()
buzzer.beep()
sleep(1)
buzzer.off()
sleep(1)
