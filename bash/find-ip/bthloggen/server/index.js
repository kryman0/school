"use strict";

const express = require("express");
const app = express();
const port = 1337;
const fs = require("fs");

var getData = {
    data: null,
    dataArray: []
};

function readDataFile() {
    fs.readFile("./data/log.json", "utf8", (err, data) => {
        getData.data = JSON.parse(data);
        for (let p in getData.data) {
            getData.dataArray.push(getData.data[p]);
        }
    });
}
readDataFile();

app.get("/", (req, res) => {
    fs.readFile("./data/menu.json", "utf8", (err, data) => {
        res.json(JSON.parse(data));
    });
});

app.get("/data", (req, res) => {
    let ipArr = [], urlArr = [], query = "";

    if (req.query.ip || req.query.url) {
        if (req.query.ip) {
            query = req.query.ip.startsWith("count") ? req.query.ip.slice(6) : req.query.ip;
        } else if (req.query.url) {
            query = req.query.url.startsWith("count") ? req.query.url.slice(6) : req.query.url;
        }
        for (let p in getData.data) {
            if (req.query.ip) {
                if (getData.data[p].ip.search(new RegExp(query, "g")) > -1) {
                    ipArr.push(getData.data[p]);
                }
            } else if (req.query.url) {
                if (getData.data[p].url.search(new RegExp(query, "g")) > -1) {
                    urlArr.push(getData.data[p]);
                }
            }
        }
        if (req.query.ip) {
            req.query.ip.startsWith("count") ?
                res.send(JSON.stringify(ipArr, null, 4) + "\n" + ipArr.length + "\n") :
                res.send(JSON.stringify(ipArr, null, 4) + "\n");
        } else if (req.query.url) {
            req.query.url.startsWith("count") ?
                res.send(JSON.stringify(urlArr, null, 4) + "\n" + urlArr.length + "\n") :
                res.send(JSON.stringify(urlArr, null, 4) + "\n");
        }
    } else {
        req.query.count ?
            res.send(JSON.stringify(getData.data, null, 4)
            + "\n" + getData.dataArray.length + "\n") :
            res.send(JSON.stringify(getData.data, null, 4) + "\n");
    }
});

app.listen(port, () => console.log(`Listening on port ${port}`));
