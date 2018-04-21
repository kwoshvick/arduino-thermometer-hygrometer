#include "DHT.h"
#include <WiFi.h>
#include <HTTPClient.h>
#define DHTPIN 13     // what digital pin we're connected to
#define DHTTYPE DHT11   // DHT 11

// Wifi credentials
const char* ssid = "xxxxxxxxxxx";
const char* password =  "xxxxxxxxxx";

HTTPClient http;

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
  Serial.println("DHT ....");
  dht.begin();
//  initialize wifi
  WiFi.begin(ssid, password);  
  while (WiFi.status() != WL_CONNECTED) { //Check for the connection
    delay(1000);
    Serial.println("Connecting to WiFi..");
  } 
  Serial.println("Connected to the WiFi network"); 
}

// send the details to the server
void send_to_server(float temperature, float humidity,float heat_index){
  // print to serial monitor console
  Serial.println("Temperature "+String(temperature)+ " Humidity "+String(humidity)+ " Heat Index "+String(heat_index));
//  http.begin("http://3388653d.ngrok.io/predictor/"+String(temperature)+"/"+String(humidity)+"/"+String(heat_index)); 
//  http.addHeader("Content-Type", "text/plain");             //Specify content-type header 
//  http.POST("POSTING from ESP32"); 
}

void loop() {
  // Wait a few seconds between measurements.
  delay(2000);
  
  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
  float humidity = dht.readHumidity();
  
  // Read temperature as Celsius (the default)
  float temperature = dht.readTemperature();

  // Check if any reads failed and exit early (to try again).
  if (isnan(humidity) || isnan(temperature)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }

  // Compute heat index in Fahrenheit (the default)
  // Compute heat index in Celsius (isFahreheit = false)
  float heat_index = dht.computeHeatIndex(temperature, humidity, false);

  // call method to send details to server
  send_to_server(temperature,humidity,heat_index);
}
