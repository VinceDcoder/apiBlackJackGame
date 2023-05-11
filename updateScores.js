var mysql = require('./node/node_modules/mysql');


var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "VinZhenToes@1937",
    database: "blackjack"
  });

function updateScore(id, score){  
  con.connect(function(err) {
    if (err) throw err;
    con.query("UPDATE blackjackScores SET highScore=" + score + " WHERE id=" + id + ";", function (err, result, fields) {
      if (err) throw err;
      console.log(result);
    });
    con.end();
  });
}
