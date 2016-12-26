# RATP Bus Schedules for LaMetric

![LaMetric Bus Ratp Index](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/ratpbus.png)

# How it works ?

First, launch your LaMetric app, install our app "RATP Bus Schedules".

![LaMetric Bus Ratp App](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/app.png)

Then, find the line, the ID Destination and ID Station from the [API RATP](https://github.com/pgrimaud/horaires-ratp-api) or see our example below.

####Example : 

If you want to get the schedules of the next bus to **Chateau de Vincennes** at the station **Montgallet**, on the line **46**.

-	Open http://api-ratp.pierre-grimaud.fr/v2/bus/46, you will get : 

```
{
    "response": {
        "destinations": [
            {
                "id_destination": "5",
                "destination": "Château de Vincennes",
                "slug": "chateau+de+vincennes"
            },
            {
                "id_destination": "183",
                "destination": "Gare du Nord",
                "slug": "gare+du+nord"
            }
        ],
        "stations": [
            ...
            {
                "id": "2929",
                "name": "Montgallet",
                "slug": "montgallet"
            },
            ...
           }
        ]
    },
    "_meta": {
        "version": "2",
        "date": "2016-12-26T18:32:58+01:00",
        "call": "GET /bus/46"
    }
}
```

-	Find the ```id_destination``` of the desired destination (5 for **Chateau de Vincennes**).

-	And find the ```id``` of the desired station (2929 for **Montgallet**).

- 	Set this numbers on LaMetric app, wait a few seconds and you will see :


![LaMetric Ratp Destination](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/destination.gif)
![LaMetric Ratp Schedule](https://raw.githubusercontent.com/pgrimaud/lametric-ratp-bus/master/images/schedules.gif)

## Feedback

If you need help, [create an issue](https://github.com/pgrimaud/lametric-ratp-bus/issues) or contact us on [Twitter](http://twitter.com/pgrimaud_)
