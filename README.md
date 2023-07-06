# ESSS Website

This is the website revision starting of Summer 2023. This website was designed by Roberto Selles experimenting with his new web markup language [Triple-M](https://www.npmjs.com/package/triple-m).

New features of this revision compared to the last edition include:
- A minimized layout with a fresh stylesheet and modern graphics
- Easier navigation with independent links
- Announcements being pulled directly from our discord server

## Development
This is a website that would possibly be maintained in the future, so these are the steps to setup the workspace for development

### Requirements
These include skill requirements:
- Node.js
  - Sass (SCSS)
  - Javascript
  - Triple-M

```bash
# Cloning the Project
git clone https://github.com/sfuesss/website
cd website
git switch Revision2023 # This assumes we have not released this revision as the master branch

# Start Testing
npm install
npm run build
npm test
```