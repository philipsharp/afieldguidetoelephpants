# Elephant Field Guide :: Contributing

Contributions are welcome. All changes must be submitted via pull request.

## Guidelines

* Changes to the content and structure of the guide should be submitted separately.
  The main exception to this is when submitting adding a new data field.
* Unrelated changes (e.g. changes to multiple elephpants) should be submitted as
  separate pull requests.
* New content must have a verifiable source.
* By submitting a pull request you are agreeing to license your contribution by
  the same license as the rest of the guide (currently
  [CC:BY-NC-SA](https://creativecommons.org/licenses/by-nc-sa/4.0/)).

## Style Guide

* Use spaces for indenting.
* Use Unix line endings (LF).
* Use a soft limit of 80 characters and a hard limit of 120 characters per line.

## Elephants

* Only "official" Elephpants are included.
* Elephpants are defined, one per file, in the `source/_elephpants` directory.
* The file name is of the structure `DATE-COLOR-IDENTIFIER.md`, where `DATE` is the
  date of public release, or public announcement (if earlier).
* Alternative animals are defined in `source/_other` following the same structure.
* When describing a new subspecies, a common name and subspecies name must also
  be added to `app/config/sculpin_site.yml`.

### Naming
* The "common name" is how the elephpant will be referred to by most people. This is
  is usually the name of the event, group, or company the elephpant was created for.
* The "subspecies name" is the third part of the full name, after  <em>{{ site.latinname }}</em>.
  This name is the choice of whomever describes (adds) the subspecies. It should be
  rendered in Latin. It is typically a direct or indirect translation of the common
  name or a creative related term.
  For translation guidance, see: https://en.wikipedia.org/wiki/Specific_name_(zoology) and
  https://entnemdept.ufl.edu/frank/KISS/kiss24.htm
* Some individuals are distinct enough from the elephpant that they should be categorized
  as a separate species. In this case the whole name is specified, e.g. <em>Elephpas mammuthus</em>.

### Descriptions
* All text should be scientifically accurate.
* A Field Guide entry is not meant to be an advertisement. For elephpants being sold by
  the sponsor, a link to an online store is allowed.

### Images

* All photos used must be covered by a Creative Commons licensed that allows re-use.
* As-of 2016-02-22, photos are stored locally from the `source/photos` directory.
* Photos should be cropped to 400 by 300 pixels.
* Preferably photos will link to a page with a full-resolution copy of the photo.
