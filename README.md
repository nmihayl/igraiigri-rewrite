# igraiigri-rewrite

The following repository hosts an attempt at a rewrite of the Bulgarian version of the flash game portal Roundgames (IgraiIgri). As it stands, the current version is in rough shape as the original website's codebase is near impossible to maintain which prompted this rewrite.

## Changes

What's different about this rewrite is it completely restructures the backend. The original site contains over 10 000 individual HTML files for each flash game hosted, as well as a fractured categorization system. This rewrite addresses the structural problem by implementing the backend with PHP and an SQLite database in which every flash game entry can be referred to. That is not mentioning the removal of Google and Facebook trackers via JavaScript which is also being addressed.

## Hosting

The original page is available here:

- [igraiigri.com](https://www.igraiigri.com/)

A mirror of the original page is here:

- [igraiigri.helliolab.giize.com](https://playground.helliolab.giize.com/)

The current development version of the rewrite is available here:

- [playground.helliolab.giize.com](https://playground.helliolab.giize.com/)

Note that the rewrite is not in a usable state; this Git repo is primarily for ease of development and version control. Currently games are playable with Ruffle (provided the flash files are present in  `flash/`), although accessing them via navigating the page normally is not possible as of yet.

## TBO

I have an archival copy of the entire 20GB worth of the original page which will soon be uploaded to archive.org. Hosting a functional copy requires the .swf, .dcr and all screenshot files which have been excluded from this repository for obvious reasons. All of the contents should, however, be accessible over at the development version mentioned earlier:

[Link to "N: The Way of the Ninja" on my rewrite version:](https://playground.helliolab.giize.com/gameview.php?id=13278)