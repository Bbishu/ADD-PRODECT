
    function loadData() {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
                  document.write(this.responseText);
              } else if (this.status == 4 &&  this.status == 404){
                  document.write("File not found.");
          }
      };
      request.open("GET", "tect.php", true);
      request.send();
  }
