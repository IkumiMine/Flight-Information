# HTTP5203 API project - Flight information
### N01442368 Ikumi Mine

## Description
 This application allows a user to search their flight information which includes airports, airlines, and schedule by a flight number. If the flight's location information is available, the real-time location of the airplane will be marked on the Google Map. * Searching by the flight date input is not working yet.

Used: HTML, CSS, Bootstrap, JavaScript, PHP, Aviationstack API, Google Maps JavaScript API

## Challenges
One of the challenges was that adding a marker to the map with the data from another API. The code to add a marker on the map was simple, but I was having difficulty displaying it on the map. I searched a lot and tried a different way. At some point, I noticed that there was an issue with the order of running functions on page load. Also, I found that the page was refreshed after the GET request was sent to get flight information, and it caused errors as well.

## How I solved the challenges
At first, I made another function to add a marker and set it to run when the page was loaded. It worked somehow, but there were still bugs and error messages, such as not showing the Google Map on the first page load. However, with the professor's help, I was able to fix the problem. I left the user input in the form and set the add marker function to run when the user input value is set. The application works fine without any error message now.

## Future updates
Currently, searching by the flight date is not working yet, so I would like to add that function. Also, I would like to refresh the flight location marker every second so a user will be able to follow 'the real-time location'.



