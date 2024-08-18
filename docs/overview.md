# Overview

The ESSS Website 2023 Edition is a static website developed to use the school's WebDAV platform. We could have used something modernly preferred such as React, however due to the lack of support, we use a tool I have developed I call Triple-M or MMM.

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
This is where the website content is saved. these contain

## Other Files
These files cover compiling configurations, and running the webpage for testing. `chunks.js` predefines macros for the compiling process. These macros are: `ICON`, `PAGE`, and `MEMBER`.