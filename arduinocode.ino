#include <SoftwareSerial.h>
SoftwareSerial esp(2, 3);
long duration ; 
int distance;
void setup() { 
// put your setup code here, to run once: 
Serial.begin(9600);
esp.begin(9600); 
esp.println("AT"); 
response(3000); 
esp.println("AT+CIOBAUD=9600"); 
response(1000); 
esp.println("AT+CWMODE=1"); 
response(2000);
esp.println("AT+CWJAP=\"Wifi Name SSID \",\"Wifi Password\""); 
response(10000); 
pinMode(9,OUTPUT); 
pinMode(10,INPUT); 
}
void loop() { 
// put your main code here, to run repeatedly:
digitalWrite(9,LOW);
delayMicroseconds(2);
digitalWrite(9,HIGH); 
delayMicroseconds(10);
digitalWrite(9,LOW); 
duration = pulseIn(10,HIGH); 
distance = duration*0.034/2; 
esp.println("AT+CIPSTART=\"TCP\",\"Your IP Address\",80"); 
response(5000); 
esp.println("AT+CIPSEND=80"); 
response(2000); 
esp.print("GET Your Link with the IP address You Used "); 
esp.print(distance);
esp.println("\r\nabcd1234"); 
response(5000);
}
void response(int waitTime) { 
for (int i = 0 ; i < waitTime; i++) 
{     if (esp.available() > 0) 
{       char x = esp.read(); 
Serial.print(x);
} 
delay(1); 
} }
