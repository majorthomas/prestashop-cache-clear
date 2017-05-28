var chalk = require('chalk');
var spawn = require('child_process').spawn;

exports.clear = function() {
  var cmd = spawn('php', [
    '-r',
    'include("' + __dirname + '/cacheclear.php");'
  ]);
  cmd.stdout.on('data', function (data) {
    console.log(data.toString());
  });
  cmd.stderr.on('data', function (data) {
    console.log(data.toString());
  });
  cmd.on('exit', function (code) {
    if (code === 0) {
      console.log(chalk.green('Cache cleared'));
    } else {
      console.log(chalk.red('Error during clear cache'));
    }
  });
}
