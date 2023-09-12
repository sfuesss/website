import express, { Express } from 'express';

const server: Express = express();

server.use("/", express.static("static"));

server.listen(3000, () => {
    console.log("ESSS website test server ready on port 3000 (http)");
    console.log("To test, go to http://localhost:3000");
});
