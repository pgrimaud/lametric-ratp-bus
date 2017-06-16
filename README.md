# RATP Bus Schedules for LaMetric

![LaMetric Bus Ratp Index](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/ratpbus.png)

# 2017-06-16 - Important update

### Parameters data have changed, due to the takedown of the old middleware. You must reconfigure your app and follow the instructions bellow. Sorry for inconvenience. 

# How it works ?

First, launch your LaMetric app, install our app "RATP Bus Schedules".

![LaMetric Bus Ratp App](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/app.png)

Then, find the line, the ID Destination and ID Station from the [API RATP](https://github.com/pgrimaud/horaires-ratp-api) or see our example below.

####Example : 

If you want to get the schedules of the next bus to **Chateau de Vincennes** at the station **Michel Bizot**, on the line **46**.

- Open https://api-ratp.pierre-grimaud.fr/v3/destinations/bus/46, you will get : 

```
{
    "result": {
        "destinations": [
            {
                "name": "Chateau de Vincennes",
                "way": "A"
            },
            {
                "name": "Gare du Nord",
                "way": "R"
            }
        ]
    },
    "_metadata": {
        "call": "GET /destinations/bus/46",
        "date": "2017-06-16T02:31:26+02:00",
        "version": 3
    }
}
```

 - Find the ```way``` of the desired destination (A for **Chateau de Vincennes**) and set it on the configuration panel.

 - Set the name of the station (michel bizot for **Michel Bizot**).

 - Wait a few seconds and you will see :

![LaMetric Ratp Destination](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/destination.gif)
![LaMetric Ratp Schedule](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/schedules.gif)

## Feedback

If you need help, [create an issue](https://github.com/pgrimaud/lametric-ratp-bus/issues) or contact us on [Twitter](http://twitter.com/pgrimaud_)
