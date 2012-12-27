var server = require("./server");
var router = require("./router");
var handlers = require("./request_handlers");

var handle = {}
handle["/"] = handlers.welcome;
handle["/save"] = handlers.save
handle["/list"] = handlers.list

server.start(router.route, handle);
