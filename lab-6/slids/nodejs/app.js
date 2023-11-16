var http = require('http');
var url = require('url');
 
http.createServer(function (req, res) {
 
  // Get the query string
  var query = url.parse(req.url, true).query;
  var name = query.name || 'World';
 
  // Write the response
  res.writeHead(200, { 'Content-Type': 'text/plain' });
  res.end(`Hello ${name}!`);
 
}).listen(8080);