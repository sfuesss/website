import express, {Express, Request, Response} from 'express';

const server: Express = express();

server.use("/", express.static("static"));

server.listen(80, () => {
    console.log("ESSS website test server ready on port 80 (http)");
    console.log("To test, go to http://localhost");
})