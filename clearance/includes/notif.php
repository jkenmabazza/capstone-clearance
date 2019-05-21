<script>

function notifyMe() {
  var num = <?php echo $num_rows ?>; // 7
  if (num === 1)
    Notification.requestPermission();
  else {
    var notification = new Notification('MESSAGE ALERT', {
      icon: 'img/uploads/site.png',
      body: "You have new message!",
    });

    notification.onclick = function () {
      window.open("inbox");      
    };
  }
}
</script>
