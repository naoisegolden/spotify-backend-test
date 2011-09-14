# Spotify Frontend Test 

Author: Naoise Golden Santos

Mail: naoise.golden@gmail.com

Start: 	2011-09-14 16:00 GMT+1

End: 2011-09-14 19:00 GMT+1

Total developing time: 3 hours

At this point I must leave. If it is possible I will continue later.

===

## IMDB top list archive

The goal of this test is to create a simple archive of the top 10 movies on IMDB. The archive should be browseable by date.

* Write a script that parses the data from the toplist found at http://www.imdb.com/chart/top and stores rank, rating, title, year and number_of_votes in a mysql database. Do also add appropriate db fields for making sure that the top list can be retrieved per date. It should be possible to set this script up as a recurring job that fetches the data automatically.
* Create a basic web page that displays the top 10 movies for a specific date. There should be an input field where the user can enter the date for which the list should be displayed. When retrieving the movie data from the database, a cache layer should be utilized to prevent the database from being queried each time the data needs to be displayed.

The code should be written in PHP5.