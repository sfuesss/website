import express, { Express } from 'express';
import * as utils from './utils';

const server: Express = express();

server.use("/", express.static("static"));

server.get("/REST/getNextMeeting", (req, res) => {
  res.send(utils.GetMeetingDate());
});

server.listen(3000, () => {
    console.log("ESSS website test server ready on port 3000 (http)");
    console.log("To test, go to http://localhost:3000");
});
