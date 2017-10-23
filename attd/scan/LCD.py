
import time

import Adafruit_CharLCD as LCD

import sys

import json

result = sys.argv[1]

lcd_rs        = 5  
lcd_en        = 6
lcd_d4        = 13
lcd_d5        = 19
lcd_d6        = 26
lcd_d7        = 20
lcd_backlight = 4

lcd_columns = 16
lcd_rows    = 2






lcd = LCD.Adafruit_CharLCD(lcd_rs, lcd_en, lcd_d4, lcd_d5, lcd_d6, lcd_d7,
                           lcd_columns, lcd_rows, lcd_backlight)

# Print a two line message
lcd.message(result)



