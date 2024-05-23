# igraiigri-rewrite

![image](/screenshot.jpg)

The following repository hosts an attempt at a rewrite of the Bulgarian version of the flash game portal Roundgames (IgraiIgri). This rewrite was prompted by the original website's near-impossible to maintain codebase.

## Changes

What's different about this rewrite is it completely restructures the backend. The original site contains over 10.000 individual HTML files for each flash game hosted, as well as a fractured categorization system and the occassional broken and/or duplicate entry. This rewrite addresses the following:

- The structural problem is being resolved by implementing the backend with PHP and an SQLite database in which every flash game entry can be referred to.

- The site's JavaScript is planned to be rewritten to ensure compatibility and removal of Google and Facebook trackers.

- The database is being manually verified to ensure proper sorting of entries as well as marking of duplicate entries and broken ones which are to be replaced with ones sourced from Flashpoint in the future.

## Hosting

The original page is available here:

- [igraiigri.com](https://www.igraiigri.com/)

A mirror of the original page is here:

- [igraiigri.helliolab.giize.com](https://igraiigri.helliolab.giize.com/)

The current development version of the rewrite is available here:

- [playground.helliolab.giize.com](https://playground.helliolab.giize.com/)

Note that the rewrite is not in a usable state; this Git repo is primarily for ease of development and version control. Currently games are playable with Ruffle (provided the flash files are present in  `flash/`), although accessing them via navigating the page normally is not possible as of yet. However, you can use `gameview.php?id=x` where x is the ID of the game sourced from the database.

## Archival copy

I've made an archival copy of the website and uploaded it [here on the Internet Archive](https://archive.org/details/igraiigri). This ZIP contains every image, Flash file, DCR file for Shockwave titles and every individual game page. 

For hosting a development version of this project, a download of this is required for the game and image files as they're not being provided with this Git repository for obvious reasons.

## Preview/Demo

["N: The Way of the Ninja" on my rewrite version](https://playground.helliolab.giize.com/gameview.php?id=13278)

[The "Tetris" subcategory listing](https://playground.helliolab.giize.com/gamelist.php?cat_id=12-9)

[Call random game ID from the database (also accessible via the gameview.php in the form of a button)](https://playground.helliolab.giize.com/random.php)

## Contributing

There are different ways to contribute to this project:

- The biggest helping hand you can provide is by contributing to the database categorizations and verifications of games. You can Git clone this repository and work on the SQLite file. For guidelines for this process, refer to the next paragraph.

- Contributing to the DB means assigning games their corresponding cat and subcat fields in accordance with the supplied DB tables. If you finish a subcat, mark the corresponding field under the "completed" column with a 1 to signify this subcat's database entries have been entered and verified. You can use [https://playground.helliolab.giize.com/gameview.php?id=x](https://playground.helliolab.giize.com/gameview.php?id=x) to enter the game ID's as they appear in the database. Note that both entries of a game that can be considered as **a duplicate should be marked as such**. Games that are **non-functional should be marked as broken** in the database and **without any `cat` and `subcat` information entered**.

- Contributing is also welcome for the JavaScript file which needs to be rewritten from scratch. 

- PHP/HTML/CSS improvements are also welcome so long as they don't rely on frameworks and expand the size of the codebase.