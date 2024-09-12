# Overview

The ESSS Website 2023 Edition is a static website developed to use the school's WebDAV platform. We could have used something modernly preferred such as React, however to make this understandable to new web developers, we use a tool I have developed called Triple-M or MMM.

# Structure
Every file is important in this project, however here are the important directories and files:
```
./
 \-- docs/
 \-- static/
     \-- css/
         \-- *.scss
     \-- documents/
     \-- img/
     \-- js/
         \-- *.js
     \-- *.mmm
     \-- index.mmm
 \-- chunks.js
 \-- index.ts
 \-- members.json
```

## `docs/`
This is where all documentation that can not be explained through code is.

## `static/`
This is where the website content is saved. these contain Javascript, Sass, and Triple-M files

### `*.mmm`
These are static page files. These get compiled into HTML to then be deployed to the ESSS website

### `css/*.scss`
These are the stylesheet files. These get compiled into css files

### `js/*.js`
The scripts that run the ESSS website as needed. Boilerplate code is in `main.js`, and this script calls from the other javascript files as needed

## Other Files
These files cover compiling, configurations, and deployment of the webpage. `chunks.js` predefines macros for the compiling process. These macros are: `ICON`, `PAGE`, and `MEMBER`. This file still uses HTML as it has to take HTML code, and paste it on the spot.

`index.ts` hosts the website for testing.

`members.json` are the members of the student society. This file holds:
- Role Codename (i.e. VPAdmin, President, DirWebsite, etc.)
  - Member Name
  - Member Role
  - Member Description
  - Job Description in Point Form
  - Social Media Platforms

